<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('create_video_thumbnail')) {
	function create_video_thumbnail($file_path) {
		// $file_name = $matches[1][count($matches[1]) - 1];
		// $dir = str_replace($file_name, '', $file_path);
		// $file_ = explode('.', $file_name);
		// $file_name = $file_[0];
		// $save_path = $dir . $file_name . '_thumb.jpg';
		$CI = &get_instance();
		$saved_file_name = $CI->upload->data('raw_name') . '_thumb.png';
		$save_path = './uploads/gallery/';
		try {

			$ffmpeg = \FFMpeg\FFMpeg::create();
			$video = $ffmpeg->open($file_path);
			$video
				->filters()
				->resize(new \FFMpeg\Coordinate\Dimension(320, 240))
				->synchronize();
			$video
				->frame(\FFMpeg\Coordinate\TimeCode::fromSeconds(10))
				->save($save_path . $saved_file_name);
			return $saved_file_name;
		} catch (\Exception $e) {
			log_message('debug', $e->getMessage());
		}

		return false;
	}
}
