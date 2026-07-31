<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CreatePage;

class PageSeeder extends Seeder
{
    /**
     * Seed Terms & Conditions and Privacy Policy pages.
     *
     * @return void
     */
    public function run()
    {
        // 1. Terms & Conditions
        CreatePage::updateOrCreate(
            ['slug' => 'terms-conditions'],
            [
                'name'        => 'Terms & Conditions',
                'title'       => 'শর্তাবলী ও নীতিমালা (Terms & Conditions)',
                'description' => '<div style="font-family: \'Hind Siliguri\', sans-serif; line-height: 1.8; color: #334155; padding: 10px 0;">
                    <p>আমাদের শপে আপনাকে স্বাগতম। আমাদের সার্ভিস ব্যবহার এবং কেনাকাটা করার আগে অনুগ্রহ করে নিম্নোক্ত শর্তাবলী ভালোভাবে পড়ে নিন:</p>
                    
                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">১. অর্ডার প্রদান ও নিশ্চিতকরণ</h4>
                    <p>ওয়েবসাইটে সঠিক নাম, মোবাইল নাম্বার এবং ডেলিভারি ঠিকানা প্রদান করে অর্ডার সম্পন্ন করতে হবে। অর্ডার পাওয়ার পর আমাদের কাস্টমার সাপোর্ট টিম থেকে ফোন বা মেসেজের মাধ্যমে অর্ডার নিশ্চিত করা হতে পারে।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">২. মূল্য ও পেমেন্ট ব্যবস্থা</h4>
                    <p>সকল পণ্যের মূল্য টাকায় (BDT) প্রদর্শিত হয়। আমরা ক্যাশ অন ডেলিভারি (Cash on Delivery) এবং অনলাইন পেমেন্ট (bKash, Nagad, Card) গ্রহণ করে থাকি। পণ্যের মূল্য যেকোনো সময় পরিবর্তন হতে পারে, তবে অর্ডার নিশ্চিত করার সময় প্রদর্শিত মূল্যই চূড়ান্ত বলে গণ্য হবে।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">৩. ডেলিভারি পলিসি</h4>
                    <p>আমরা ঢাকা সিটির ভেতরে সাধারণত ২৪-৪৮ ঘণ্টার মধ্যে এবং ঢাকা সিটির বাইরে ২-৪ দিনের মধ্যে ডেলিভারি দিয়ে থাকি। প্রাকৃতিক দুর্যোগ বা অনাকাঙ্ক্ষিত পরিস্থিতিতে ডেলিভারি সময় কিছুটা বেশি লাগতে পারে।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">৪. রিটার্ন ও রিফান্ড নীতি</h4>
                    <p>প্যাকেট বা পণ্য ক্ষতিগ্রস্ত অথবা ভুল পণ্য সরবরাহ করা হলে ডেলিভারি ম্যানের উপস্থিতিতেই পণ্যটি চেক করে ফেরৎ দেওয়া যাবে। যেকোনো রিটার্ন বা রিফান্ডের জন্য ডেলিভারির ২৪ ঘণ্টার মধ্যে আমাদের কাস্টমার কেয়ারে যোগাযোগ করতে হবে।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">৫. কাস্টমার সাপোর্ট</h4>
                    <p>যেকোনো সহায়তার জন্য আমাদের সাথে যোগাযোগ করুন: হটলাইন: <b>01765-696010</b> অথবা আমাদের সাপোর্ট পেজে মেসেজ দিন।</p>
                </div>',
                'status'      => 1,
            ]
        );

        // 2. Privacy Policy
        CreatePage::updateOrCreate(
            ['slug' => 'privacy-policy'],
            [
                'name'        => 'Privacy Policy',
                'title'       => 'গোপনীয়তা নীতি (Privacy Policy)',
                'description' => '<div style="font-family: \'Hind Siliguri\', sans-serif; line-height: 1.8; color: #334155; padding: 10px 0;">
                    <p>আপনার ব্যক্তিগত তথ্যের সুরক্ষা এবং গোপনীয়তা বজায় রাখতে আমরা প্রতিশ্রুতিবদ্ধ। আমরা কীভাবে আপনার তথ্য সংগ্রহ এবং ব্যবহার করি তা নিচে তুলে ধরা হলো:</p>
                    
                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">১. তথ্য সংগ্রহ</h4>
                    <p>অর্ডার প্রক্রিয়াকরণের জন্য আমরা আপনার নাম, ফোন নাম্বার, ইমেইল এড্রেস এবং শিপিং ঠিকানা সংগ্রহ করে থাকি। এই তথ্যগুলো শুধুমাত্র আপনার অর্ডার প্রসেসিং ও ডেলিভারি সম্পন্ন করার কাজে ব্যবহৃত হয়।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">২. তথ্যের নিরাপত্তা</h4>
                    <p>আমরা আপনার তথ্যের সর্বোচ্চ নিরাপত্তা সুনিশ্চিত করি। আপনার ব্যক্তিগত তথ্য তৃতীয় কোনো ব্যক্তি বা প্রতিষ্ঠানের কাছে বিক্রি, বিনিময় বা ভাড়া দেওয়া হয় না।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">৩. কুকিজ (Cookies) ব্যবহার</h4>
                    <p>আমাদের ওয়েবসাইট ব্রাউজিং অভিজ্ঞতা উন্নত করতে এবং শপিং কার্ট সেশন বজায় রাখতে আমরা কুকিজ ব্যবহার করি। আপনি চাইলে আপনার ব্রাউজার সেটিংস থেকে কুকিজ নিষ্ক্রিয় করতে পারেন।</p>

                    <h4 style="color: #1e73be; font-weight: 700; margin-top: 20px; font-size: 16px;">৪. নীতিমালার পরিবর্তন</h4>
                    <p>যেকোনো সময় এই গোপনীয়তা নীতি আপডেট করার অধিকার সংরক্ষিত। যেকোনো নীতিগত পরিবর্তন এই পেজে প্রকাশিত হবে।</p>
                </div>',
                'status'      => 1,
            ]
        );
    }
}
