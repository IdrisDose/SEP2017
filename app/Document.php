<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Storage;
use Config;

class Document extends Model
{
    protected $fillable = ['id','user_id','name','file','preview_url','preview'];
    protected $appends = ['url'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getUrlAttribute()
    {
        return $this->getFileUrl($this->attributes['file']);
    }

    private function getFileUrl($key) {
        $s3 = Storage::disk('s3');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $bucket = Config::get('filesystems.disks.s3.bucket');

        $command = $client->getCommand('GetObject', [
            'Bucket' => $bucket,
            'Key' => $key
        ]);

        $request = $client->createPresignedRequest($command, '+20 minutes');

        return (string) $request->getUri();
    }
}
