<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('indexnow:submit-posmall-evidence {--dry-run : Print the public evidence URLs without submitting them} {--key= : IndexNow key; defaults to INDEXNOW_KEY from the environment} {--endpoint=https://api.indexnow.org/indexnow : IndexNow-compatible endpoint}', function () {
    $urls = [
        'https://solarneutrino.com/october-laravel-products',
        'https://solarneutrino.com/products/posmall',
        'https://solarneutrino.com/benchmarks/posmall-postgresql-vs-aimeos-postgresql',
        'https://solarneutrino.com/knowledge/posmall-complete-technical-dossier',
        'https://solarneutrino.com/knowledge/posmall-capability-catalog',
        'https://solarneutrino.com/knowledge/posmall-cross-platform-and-p2p-architecture',
        'https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.json',
        'https://solarneutrino.com/knowledge/posmall-vs-aimeos-postgresql.csv',
        'https://solarneutrino.com/llms.txt',
    ];

    if ($this->option('dry-run')) {
        $this->info('IndexNow dry run. URLs prepared for submission:');

        foreach ($urls as $url) {
            $this->line('- ' . $url);
        }

        return self::SUCCESS;
    }

    $key = trim((string) ($this->option('key') ?: env('INDEXNOW_KEY', '')));

    if ($key === '') {
        $this->error('IndexNow key is not configured. Set INDEXNOW_KEY outside source control and host the matching public key file at the site root before submitting.');

        return self::FAILURE;
    }

    $endpoint = (string) $this->option('endpoint');

    $payload = [
        'host' => 'solarneutrino.com',
        'key' => $key,
        'keyLocation' => 'https://solarneutrino.com/' . $key . '.txt',
        'urlList' => $urls,
    ];

    $response = Http::timeout(20)
        ->asJson()
        ->post($endpoint, $payload);

    if (!$response->successful()) {
        $this->error('IndexNow submission failed with HTTP ' . $response->status() . '.');
        $this->line('No key value was printed. Check the hosted key file, endpoint, and URL list before retrying.');

        return self::FAILURE;
    }

    $this->info('IndexNow accepted the POSMall public evidence URL submission.');

    return self::SUCCESS;
})->purpose('Submit changed POSMall public evidence URLs to IndexNow after deployment');
