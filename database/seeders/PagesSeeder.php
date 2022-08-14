<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->removeAboutUs();
        $this->storeAboutUs();
        $this->removeOurProducts();
        $this->storeOurProducts();
        $this->removeFirstSlider();
        $this->storeFirstSlider();
        $this->removeSecondSlider();
        $this->storeSecondSlider();
        $this->removeThirdSlider();
        $this->storeThirdSlider();
    }

    public function storeAboutUs()
    {
        $new_about = new Page();
        $new_about->id = 1;
        $new_about->description_ar = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع";
        $new_about->description_en = "This text is an example that can be replaced in the same space, where you can create this text from the Arabic text generator, where you can generate text or other texts in addition to increasing the number of characters generated by the application. Arabic text templates Increase paragraphs as you want, Arabic text is useful for web designers in particular, where the client needs in a linguistic image to design the site. Arabic text templates Increase paragraphs as you want, Arabic text is useful for web designers in particular, where the client needs in a linguistic image to design the site";
        $new_about->title_ar = "من نحن";
        $new_about->title_en = "About Us";

        $result = $new_about->save();
    }

    public function removeAboutUs()
    {
        $about = Page::where('id',1)->first();
        if (!(is_null($about))) {
            $result = $about->ForceDelete();
            
        }
    }

    public function storeOurProducts()
    {
        $new_our_product = new Page();
        $new_our_product->id = 2;
        $new_our_product->description_ar = "هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.";
        $new_our_product->description_en = "This text is an example of a text that can be replaced in the same space. This text was generated from the Arabic text generator, where you can generate such text or many other texts in addition to increasing the number of characters generated by the application.";
        $new_our_product->title_ar = "منتجاتنا";
        $new_our_product->title_en = "Our Products";

        $result = $new_our_product->save();
    }

    public function removeOurProducts()
    {
        $our_products = Page::find(2);
        if (!(is_null($our_products))) {
            $result = $our_products->ForceDelete();
        }
    }

    public function storeFirstSlider()
    {
        $new_first_slider = new Page();
        $new_first_slider->id = 3;
        $new_first_slider->description_ar = "قم ببيع وشراء كل شيء من السيارات المستعملة إلى الهواتف المحمولة وأجهزة الكمبيوتر ، أو ابحث عن العقارات والوظائف والمزيد";
        $new_first_slider->description_en = "Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more";
        $new_first_slider->title_ar = "انشر إعلانات مجانية";
        $new_first_slider->title_en = "Post Free Ads";

        $result = $new_first_slider->save();
    }

    public function removeFirstSlider()
    {
        $first_slider = Page::find(3);
        if (!(is_null($first_slider))) {
            $result = $first_slider->ForceDelete();
        }
    }

    public function storeSecondSlider()
    {
        $new_Second_slider = new Page();
        $new_Second_slider->id = 4;
        $new_Second_slider->description_ar = "قم ببيع وشراء كل شيء من السيارات المستعملة إلى الهواتف المحمولة وأجهزة الكمبيوتر ، أو ابحث عن العقارات والوظائف والمزيد";
        $new_Second_slider->description_en = "Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more";
        $new_Second_slider->title_ar = "انشر إعلانات مجانية";
        $new_Second_slider->title_en = "Post Free Ads";

        $result = $new_Second_slider->save();
    }

    public function removeSecondSlider()
    {
        $Second_slider = Page::find(4);
        if (!(is_null($Second_slider))) {
            $result = $Second_slider->ForceDelete();
        }
    }

    public function storeThirdSlider()
    {
        $new_third_slider = new Page();
        $new_third_slider->id = 5;
        $new_third_slider->description_ar = "قم ببيع وشراء كل شيء من السيارات المستعملة إلى الهواتف المحمولة وأجهزة الكمبيوتر ، أو ابحث عن العقارات والوظائف والمزيد";
        $new_third_slider->description_en = "Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more";
        $new_third_slider->title_ar = "انشر إعلانات مجانية";
        $new_third_slider->title_en = "Post Free Ads";

        $result = $new_third_slider->save();
    }

    public function removeThirdSlider()
    {
        $third_slider = Page::find(5);
        if (!(is_null($third_slider))) {
            $result = $third_slider->ForceDelete();
        }
    }
}