<?php

date_default_timezone_set('Europe/Stockholm');
class DateTimeView {

    
 
	public function show() {

            
		$timeString = date('l\, \t\h\e jS \o\f F Y\, \T\h\e \t\i\m\e \i\s H:i:s');

		return '<p>' . $timeString . '</p>';
	}
        
        public function returnDate(){
            $date = date('o-m-d H:i:s');
            return $date;
        }
        
}