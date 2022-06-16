<?php

use Illuminate\Database\Seeder;

class PagesSeeder extends Seeder {
    /**
    * Run the database seeds.
    *
    * @return void
    */

    public function run() {
        DB::table( 'pages' )->insert( [
            'page_name' => 'Home',
            'slug' => 'home',
            'language' => 'English',
            'page_content' => '<p>Ahmad Albijady Real Estate Group for Property Development and Management has been considered as one of the Real Estate groups that has a relevant and valuable experience in the field of property development and investment in addition to marketing real estate and property management. Where the group is characterized by its branches throughout the Kingdom of Saudi Arabia, particularly the main cities (Riyadh - Jeddah - Dammam) and outside the KSA (in the United Arab Emirates).</p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'اهلا وسهلا',
            'slug' => 'home-ar',
            'language' => 'Arabic',
            'page_content' => 
                            '<p>تعد مجموعة احمد البجادي للتطوير العقاري وإدارة الأملاك واحدة من المجموعات العقارية ذات الخبرة الواسعة والطويلة في مجال الاستثمار والتسويق العقاري إضافة الى ادارة الأملاك، حيث تتميز المجموعة بفروعها المنتشرة في المملكة العربية السعودية وخاصة مدنها الرئيسية:</p>

                                <p>(الرياض&nbsp;&nbsp;&ndash;&nbsp;جدة&nbsp;&nbsp; &ndash;&nbsp;الدمام).</p>

                                <p>وخارج المملكة:</p>

                                <p>(دولة الإمارات العربية).</p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'About US',
            'slug' => 'about-us',
            'language' => 'English',
            'page_content' => '
                                <p>Ahmad Albijady Real Estate Group for Property Development and Management was established from more than 20 years, a group that offers real estate services including (sales-Buy-Rental-Investment) and other real estate services traded in the real estate market. However, Ahmad Albijady Group is characterized by the property management where it is originated to help you with all of your needs.</p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'معلومات عنا :',
            'slug' => 'about-us-ar',
            'language' => 'Arabic',
            'page_content' => 
                                '<p>تأسست مجموعة أحمد البجادي للتطوير العقاري منذ اكثر من 20 سنة وهي مجموعة عقارية تقدم الخدمات العقارية من ( بيع - شراء - تأجير - استثمار) وغيرها من الخدمات العقارية المتداولة بالسوق العقاري ولكن تتميز بقسم إدارة الأملاك باستراتيجية نابعه من الحرص على راحة المالك وخدمة المستأجر.</p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'Our Services',
            'slug' => 'our-services',
            'language' => 'English',
            'page_content' => '<p><strong>Marketing Department:</strong>Albjady group observe to employ and attract highly qualified to work to bring out marketing distinct properties both from the sale or rent or invest put the basics of the most important (put banners set for that property as well, put paper ads distributed to more than 6,000 sides real estate similar place ads in newspapers, traded sites Electronic, free sms).</p>

            <p>&nbsp;</p>
            
            <p><strong>Property management department: -</strong>The Evolution of the role gradually Group has expanded in the field of property management and the confidence of our valued customers and our credibility and seriousness and the mechanism of the marketing organization, so we are responsible for a large part of rents inside and outside the Kingdom , the group is characterized to ensure the rental costs for the owner-time solutions without any delay and the allocation ratio % of the amount of each ration of the rent to be agreed upon in advance with the owner of the property in addition to the group to ensure the safety of the leased property from any damage caused by the tenant and ensure that the amounts of consumption, whether for electricity, water or sewage or other, which is under executive at the same property in addition to the present of technicians those in charge of Property maintenance service within 24 hours depending the need as required,The group also works to raise the level of real estate simple additions due beneficial to the future owner to raise rents and lack of empty units.</p>
            
            <p>&nbsp;</p>
            
            <p><strong>Contracting Maintenance Department:-</strong>&nbsp;the Group has a group of skilled manpower in the field of construction and maintenance of the building and the restoration and maintenance of the entire property.</p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'دخدمات المجموعة,',
            'slug' => 'our-services-ar',
            'language' => 'Arabic',
            'page_content' => '
                                <p><strong>تقدم المجموعة الخدمات الشاملة للسوق العقاري وهي: -</strong></p>

                                <p><strong>قسم التسويق:</strong>&nbsp;حرصت المجموعة على توظيف وإستقطاب الكفاءات العالية للعمل على إبراز تسويق متميز للعقارات سواء من بيع أو إيجار أو إستثمار بوضع اساسيات من أبرزها (وضع اللافتات المبينة لذلك العقار بالإضافة إلى الإعلانات الورقية الموزعة على أكثر من 6000 جهة عقارية مماثله ووضع إعلانات بالصحف المتداولة والمواقع الالكترونية والرسائل المجانية)</p>

                                <p><br />
                                <strong>قسم إدارة الأملاك والتحصيل :</strong>&nbsp;تطور دور المجموعة تدريجيا وتوسعت في مجال إدارة الأملاك وبثقة عملائنا الكرام وبمصداقيتنا والجدية وآلية التسويق المنظمة لذا أصبحنا المجموعة المسئولة عن قطاع كبير من الإيجارات داخل المملكة وخارجها, هنا تميزت المجموعة بضمان مبالغ الإيجارات للمالك وقت حلولها دون أي تأخير ويكون ذلك بإقتطاع نسبة % من مبلغ كل قسط&nbsp; للإيجار يتم الإتفاق عليها مسبقا مع مالك العقار بالإضافة إلى أن المجموعة تضمن سلامة العين المؤجرة من أي تلف يتسبب بها المستأجر وتضمن مبالغ الإستهلاكات سواء للكهرباء أو المياه أو الصرف الصحي أو غيرها مما هو جاري في العقار نفسه إضافة لوجود فنيين قائمين على خدمة صيانة العقار خلال 24 ساعه على حسب ماتقتضيه الحاجه وتعمل المجموعة أيضا على رفع مستوى العقار من إضافات بسيطة ترجع بالنفع على المالك مستقبلا برفع الإيجارات وإنعدام وجود الوحدات الفارغة.</p>

                                    <p><br />
                                    <strong>قسم المقاولات الصيانة :</strong>&nbsp;تملك المجموعة نخبة من أمهر الأيدي العاملة في مجال المقاولات والصيانة من بناء وترميم وصيانة للعقار بأكمله.</p>',
            'status' => 1,
        ] );

        

        DB::table( 'pages' )->insert( [
            'page_name' => 'Contract Info',
            'slug' => 'contract-us',
            'language' => 'English',
            'page_content' => '<p>Saudi Arabia&nbsp;(&nbsp;Riyadh&nbsp;/&nbsp;Jeddah/&nbsp;Dammam)<br />
            The United Arab&nbsp;Emirates (&nbsp;Ajman)<br />
            Uniform&nbsp;Number:&nbsp;920002 313<br />
            Mobile:&nbsp;05026 7777&nbsp;9<br />
            Email:&nbsp;<a href="http://127.0.0.1:8000/contact#">am1_albijadL@hotmail.com</a></p>',
            'status' => 1,
        ] );

        DB::table( 'pages' )->insert( [
            'page_name' => 'اتصل بنا',
            'slug' => 'contract-us-ar',
            'language' => 'Arabic',
            'page_content' => '
                                المملكة العربية السعودية (الرياض / جده / الدمام)
دولة الإمارات العربية المتحدة (عجمان)
الرقم الموحد: 920002 313
الجوال: 05026 7777 9
البريد الالكتروني: am1_albijadL@hotmail.com',
            'status' => 1,
        ] );


         DB::table( 'pages' )->insert( [
            'page_name' => 'قسم المقاولات',
            'slug' => 'contracting-ar',
            'language' => 'Arabic',
            'page_content' => '<p>تأسست مؤسسة أحمد البجادي للمقاولات والصيانة في عام 2007 م وقد عملت المؤسسة طوال تلك الفتره على استقطاب أفضل الأيدي العاملة المهره للعمل على إنجاز وإبراز أعمالنا بالشكل المتميز عن غيرنا وتم بحمد الله انشاء عدد من المشاريع من قصور وفلل والعمائر التجارية والسكنية والمستودعات والمزارع والاستراحات وغيرها من الإنشاءات، وتحرص المؤسسة على الالتزام بمواعيد التسليم والإستلام في الوقت المحدد علما بأن المؤسسة حريصة كل الحرص على أن يكون هناك عقود رسمية موثقة للبدء باي عمل وهذا يكون لمصلحة جميع الأطراف، وتلتزم المؤسسة مع جميع عملائها بالمصداقيه والأمانة بنوعية المواد وقدرات الفنيين من موظفين ومهندسين ومشرفين وعمال.</p>

                <p><br />
نبذه عن بعض أعمال المؤسسة :-</p>

<p><br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;إنشاءات مباني عامه.<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال البناء والياصه.&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال تركيب الحجر والرخام وغيرها.&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال الدهانات بأنواعها وأشكالها المختلفه.<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال الحداده والأ لمنيوم.<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال النجاره والخشب.<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال التبليط والترويب.&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال الجبس والديكور.&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال السباكه والكهرباء.&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال الأسقف المستعارة والقرميد .&nbsp;<br />
<img src="http://0502677779.com/images/star.png" style="width:20px" />&nbsp;أعمال الحفر والتمديد والري.</p>

<p><br />
نفتخر بخدمتكم لأنها هدفنا.</p>',

            'status' => 1,
        ] );


    }
}
