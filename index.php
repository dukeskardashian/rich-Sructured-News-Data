public function head()
{
	$this->output(
		'<head>',
		'<meta http-equiv="content-type" content="' . $this->content['content_type'] . '"/>',
		'<script type="application/json" src="rich/rich.php"></script>', // Verweis auf rich/rich.php
		'</head>'
	);
}
