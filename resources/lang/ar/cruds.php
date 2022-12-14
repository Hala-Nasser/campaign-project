<?php

return [
    'userManagement' => [
        'title'          => 'إدارة المستخدمين',
        'title_singular' => 'إدارة المستخدمين',
    ],
    'permission' => [
        'title'          => 'الصلاحيات',
        'title_singular' => 'الصلاحية',
        'fields'         => [
            'id'                => 'رقم التعريف',
            'id_helper'         => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'created_at'        => 'تاريخ الانشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التعديل',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'الادوار',
        'title_singular' => 'الدور',
        'fields'         => [
            'id'                 => 'رقم التعريف',
            'id_helper'          => ' ',
            'title'              => 'العنوان',
            'title_helper'       => ' ',
            'permissions'        => 'الصلاحيات',
            'permissions_helper' => ' ',
            'created_at'         => 'تاريخ الانشاء',
            'created_at_helper'  => ' ',
            'updated_at'         => 'تاريخ التعديل',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'تاريخ الحذف',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'المستخدمين',
        'title_singular' => 'مستخدم',
        'fields'         => [
            'id'                       => 'رقم التعريف',
            'id_helper'                => ' ',
            'name'                     => 'الاسم',
            'name_helper'              => ' ',
            'email'                    => 'البريد الالكتروني',
            'email_helper'             => ' ',
            'email_verified_at'        => 'تاريخ التحقق من البريد الالكتروني',
            'email_verified_at_helper' => ' ',
            'password'                 => 'كلمة المرور',
            'password_helper'          => ' ',
            'roles'                    => 'الادوار',
            'roles_helper'             => ' ',
            'remember_token'           => 'تذكر الرمز',
            'remember_token_helper'    => ' ',
            'created_at'               => 'تاريخ الانشاء',
            'created_at_helper'        => ' ',
            'updated_at'               => 'تاريخ التعديل',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'تاريخ الحذف',
            'deleted_at_helper'        => ' ',
        ],
    ],
    'mainMenu' => [
        'title'          => 'القائمة الرئيسية',
        'title_singular' => 'القائمة الرئيسية',
    ],
    'about' => [
        'title'          => 'من نحن',
        'title_singular' => 'من نحن',
        'fields'         => [
            'id'                    => 'رقم التعريف',
            'id_helper'             => ' ',
            'title_en'              => 'العنوان بالانجليزية',
            'title_en_helper'       => ' ',
            'title_ar'              => 'العنوان بالعربية',
            'title_ar_helper'       => ' ',
            'logo'                  => 'الشعار',
            'logo_helper'           => ' ',
            'description_en'        => 'الوصف بالانجليزية',
            'description_en_helper' => ' ',
            'description_ar'        => 'الوصف بالعربية',
            'description_ar_helper' => ' ',
            'key_words_en'          => 'الكلمات المفتاحية بالانجليزية',
            'key_words_en_helper'   => ' ',
            'key_words_ar'          => 'الكلمات المفتاحية بالعربية',
            'key_words_ar_helper'   => ' ',
            'created_at'            => 'تاريخ الانشاء',
            'created_at_helper'     => ' ',
            'updated_at'            => 'تاريخ التعديل',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'تاريخ الحذف',
            'deleted_at_helper'     => ' ',
            'phone'                 => 'رقم الهاتف',
            'phone_helper'          => ' ',
            'email'                 => 'البريد الالكتروني',
            'email_helper'          => ' ',
            'website'               => 'موقع الويب',
            'website_helper'        => ' ',
        ],
    ],
    'contactField' => [
        'title'          => 'بيانات التواصل',
        'title_singular' => 'بيانات التواصل',
        'fields'         => [
            'id'                => 'رقم التعريف',
            'id_helper'         => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'value'             => 'القيمة',
            'value_helper'      => ' ',
            'about'             => 'من نحن',
            'about_helper'      => ' ',
            'created_at'        => 'تاريخ الانشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التعديل',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'page' => [
        'title'          => 'الصفحات',
        'title_singular' => 'الصفحة',
        'fields'         => [
            'id'                    => 'رقم التعريف',
            'id_helper'             => ' ',
            'image'                 => 'الصورة',
            'image_helper'          => ' ',
            'description_en'        => 'الوصف بالانجليزية',
            'description_en_helper' => ' ',
            'description_ar'        => 'الوصف بالعربية',
            'description_ar_helper' => ' ',
            'title_en'              => 'العنوان بالانجليزية',
            'title_en_helper'       => ' ',
            'title_ar'              => 'العنوان بالعربية',
            'title_ar_helper'       => ' ',
            'created_at'            => 'تاريخ الانشاء',
            'created_at_helper'     => ' ',
            'updated_at'            => 'تاريخ التعديل',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'تاريخ الحذف',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'product' => [
        'title'          => 'المنتجات',
        'title_singular' => 'المنتج',
        'fields'         => [
            'id'                         => 'رقم التعريف',
            'id_helper'                  => ' ',
            'image'                      => 'الصورة',
            'image_helper'               => ' ',
            'title_en'                   => 'العنوان بالانجليزية',
            'title_en_helper'            => ' ',
            'title_ar'                   => 'العنوان بالعربية',
            'title_ar_helper'            => ' ',
            'price'                      => 'السعر',
            'price_helper'               => ' ',
            'discount_percentage'        => 'نسبة الخصم',
            'discount_percentage_helper' => ' ',
            'description_en'             => 'الوصف بالانجليزية',
            'description_en_helper'      => ' ',
            'description_ar'             => 'الوصف بالعربية',
            'description_ar_helper'      => ' ',
            'created_at'                 => 'تاريخ الانشاء',
            'created_at_helper'          => ' ',
            'updated_at'                 => 'تاريخ التعديل',
            'updated_at_helper'          => ' ',
            'deleted_at'                 => 'تاريخ الحذف',
            'deleted_at_helper'          => ' ',
            'link'                       => 'رابط الطلب',
            'link_helper'                => ' ',
        ],
    ],
    'contactUs' => [
        'title'          => 'تواصل معنا',
        'title_singular' => 'تواصل معنا',
        'fields'         => [
            'id'                => 'رقم التعريف',
            'id_helper'         => ' ',
            'name'              => 'الاسم',
            'name_helper'       => ' ',
            'email'             => 'البريد الالكتروني',
            'email_helper'      => ' ',
            'message'           => 'الرسالة',
            'message_helper'    => ' ',
            'created_at'        => 'تاريخ الانشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التعديل',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
    'partner' => [
        'title'          => 'شركاء النجاح',
        'title_singular' => 'شريك النجاح',
        'fields'         => [
            'id'                    => 'رقم التعريف',
            'id_helper'             => ' ',
            'image'                 => 'الصورة',
            'image_helper'          => ' ',
            'name_en'               => 'الاسم بالانجليزية',
            'name_en_helper'        => ' ',
            'name_ar'               => 'الاسم بالعربية',
            'name_ar_helper'        => ' ',
            'job_title_en'          => 'المسمى الوظيفي بالانجليزية',
            'job_title_en_helper'   => ' ',
            'job_title_ar'          => 'المسمى الوظيفي بالعربية',
            'job_title_ar_helper'   => ' ',
            'description_en'        => 'الوصف بالانجليزية',
            'description_en_helper' => ' ',
            'description_ar'        => 'الوصف بالعربية',
            'description_ar_helper' => ' ',
            'created_at'            => 'تاريخ الانشاء',
            'created_at_helper'     => ' ',
            'updated_at'            => 'تاريخ التعديل',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'تاريخ الحذف',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'portfolio' => [
        'title'          => 'معرض الاعمال',
        'title_singular' => 'معرض الاعمال',
        'fields'         => [
            'id'                => 'رقم التعريف',
            'id_helper'         => ' ',
            'image'             => 'الصورة',
            'image_helper'      => ' ',
            'title'             => 'العنوان',
            'title_helper'      => ' ',
            'created_at'        => 'تاريخ الانشاء',
            'created_at_helper' => ' ',
            'updated_at'        => 'تاريخ التعديل',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'تاريخ الحذف',
            'deleted_at_helper' => ' ',
        ],
    ],
];
