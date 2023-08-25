<?php

namespace App\Http\Controllers;

use RalphJSmit\Laravel\SEO\Support\SEOData;

class StaticController extends Controller
{
    public function home()
    {
        return view('home', [
            'SEOData' => new SEOData(
                title: 'RYCBAR - maintenance and development of long-life software',
                description: 'RYCBAR is company with main idea of long-life software maintenance'
            )
        ]);
    }

    public function contacts()
    {
        return view('contacts', [
            'SEOData' => new SEOData(
                title: 'Contacts - RYCBAR software',
                description: 'Contacts and feedback form of company RYCBAR software'
            )
        ]);
    }
}
