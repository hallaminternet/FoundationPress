<?php
/*
Template Name: Clint Eastwood
*/




class Clint {

	public function __construct() {

		// name
		$this->name = NULL;

		// status
		$alive = get_field('clint__alive');
		if ( $alive ):
			$this->status = 'alive';
		else:
			$this->status = 'dead';
		endif;

		// dates
		$this->date_of_birth = get_field('clint__date_of_birth');
		$this->date_of_death = false;
		if ( $this->status == 'dead' ):
			$this->date_of_death = get_field('clint__date_of_death');
		endif; 

		// age
		$from = new DateTime($this->date_of_birth);
		if ( $this->status == 'dead' ):
			$to = new DateTime($this->date_of_death);
		else:
			$to = new DateTime('now');
		endif;
		$this->age = $from->diff($to)->y;

		// quotes
		$this->quotes = array();
		while ( have_rows('clint__quotes') ):
			the_row();

			// build quote
			$quote = array();
			$quote['content']	= '&#8220;' . trim(strip_tags(apply_filters('the_content', get_sub_field('quote')))) . '&#8221;';
			$movie 	= get_sub_field('movie');
			$year 	= get_sub_field('year');
			$quote['label']		= false;
			if ( $movie ):
				$quote['label']		.= $movie;
			endif;
			if ( $movie && $year ):
				$quote['label']		.= ', ';
			endif;
			if ( $year ):
				$quote['label']		.= $year;
			endif;

			// add to quotes
			$this->quotes[] = $quote;

		endwhile;


	}

}


// timber set-up
$context			= Timber::get_context();
$post				= new TimberPost();
$context['post']	= $post;
$context['clint'] 	= new Clint;


// render
Timber::render( array( 'pages/clint-eastwood.twig' ), $context );


?>