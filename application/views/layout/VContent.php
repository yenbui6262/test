<?php
	$data['url'] = base_url();
	$this->parser->parse('layout/VHeader', $data);
	$this->parser->parse($template, $data);
	$this->parser->parse('layout/VFooter', $data);
?>