<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAboutRequest;
use App\Http\Requests\StoreAboutRequest;
use App\Http\Requests\UpdateAboutRequest;
use App\Models\About;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AboutController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('about_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $abouts = About::with(['media'])->get();

        return view('admin.abouts.index', compact('abouts'));
    }

    public function create()
    {
        abort_if(Gate::denies('about_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.abouts.create');
    }

    public function store(StoreAboutRequest $request)
    {
        $about = About::create($request->all());

        if ($request->input('logo', false)) {
            $about->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $about->id]);
        }

        return redirect()->route('admin.abouts.index');
    }

    public function edit(About $about)
    {
        abort_if(Gate::denies('about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.abouts.edit', compact('about'));
    }

    public function update(UpdateAboutRequest $request, About $about)
    {
        $about->update($request->all());

        if ($request->input('logo', false)) {
            if (!$about->logo || $request->input('logo') !== $about->logo->file_name) {
                if ($about->logo) {
                    $about->logo->delete();
                }
                $about->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($about->logo) {
            $about->logo->delete();
        }

        return redirect()->route('admin.abouts.index');
    }

    public function show(About $about)
    {
        abort_if(Gate::denies('about_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $about->load('aboutContactFields');

        return view('admin.abouts.show', compact('about'));
    }

    public function destroy(About $about)
    {
        abort_if(Gate::denies('about_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $about->delete();

        return back();
    }

    public function massDestroy(MassDestroyAboutRequest $request)
    {
        About::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('about_create') && Gate::denies('about_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new About();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
