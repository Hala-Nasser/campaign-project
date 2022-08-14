<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPortfolioRequest;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Portfolio;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PortfolioController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('portfolio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolios = Portfolio::with(['media'])->get();

        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        abort_if(Gate::denies('portfolio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.create');
    }

    public function store(StorePortfolioRequest $request)
    {
        $portfolio = Portfolio::create($request->all());

        if ($request->input('image', false)) {
            $portfolio->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $portfolio->id]);
        }

        return redirect()->route('admin.portfolios.index');
    }

    public function edit(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio)
    {
        $portfolio->update($request->all());

        if ($request->input('image', false)) {
            if (!$portfolio->image || $request->input('image') !== $portfolio->image->file_name) {
                if ($portfolio->image) {
                    $portfolio->image->delete();
                }
                $portfolio->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($portfolio->image) {
            $portfolio->image->delete();
        }

        return redirect()->route('admin.portfolios.index');
    }

    public function show(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.portfolios.show', compact('portfolio'));
    }

    public function destroy(Portfolio $portfolio)
    {
        abort_if(Gate::denies('portfolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $portfolio->delete();

        return back();
    }

    public function massDestroy(MassDestroyPortfolioRequest $request)
    {
        Portfolio::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('portfolio_create') && Gate::denies('portfolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Portfolio();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
