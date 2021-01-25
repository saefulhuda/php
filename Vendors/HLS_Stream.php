<?php
require 'vendor/autoload.php';
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

use Streaming\FFMpeg;

$config = [
    'ffmpeg.binaries'  => '/usr/bin/ffmpeg',
    'ffprobe.binaries' => '/usr/bin/ffprobe',
    'timeout'          => 3600, // The timeout for the underlying process
    'ffmpeg.threads'   => 12,   // The number of threads that FFmpeg should use
];

$log = new Logger('FFmpeg_Streaming');
$log->pushHandler(new StreamHandler('/var/log/ffmpeg-streaming.log')); // path to log file
    
$ffmpeg = FFMpeg::create($config, $log);
$video = $ffmpeg->open('https://imgs.oomph.co.id/files/uploads/video_large_files/2020/10/20/150/UGC_20201020150_Mh4rWd2umU.mp4');

?>