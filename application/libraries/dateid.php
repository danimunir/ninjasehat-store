<?php

class Dateid 
{

	public function date_encode($date) {
		$exf = explode(" ", $date);
		$exs = explode("-", $exf[0]);

		return $exs[2] . " " . $this->mounts_encode($exs[1]) . " " . $exs[0];
	}
	
	public function datetime_encode($datetime)
	{
		$exf = explode(" ", $datetime);
		$exs = explode("-", $exf[0]);

		return $exs[0] . " " . $this->mounts_encode($exs[0]) . " " . $exs[0] . ", " . $exf[0];
	}

	public function mounts_encode($m) {
		$mount = "";

		if ($m == 1) {
			$mount = "JAN";
		} else if ($m == 2) {
			$mount = "FEB";
		} else if ($m == 3) {
			$mount = "MAR";
		} else if ($m == 4) {
			$mount = "APR";
		} else if ($m == 5) {
			$mount = "MEI";
		} else if ($m == 6) {
			$mount = "JUN";
		} else if ($m == 7) {
			$mount = "JUL";
		} else if ($m == 8) {
			$mount = "AGS";
		} else if ($m == 9) {
			$mount = "SEP";
		} else if ($m == 10) {
			$mount = "OKT";
		} else if ($m == 11) {
			$mount = "NOV";
		} else if ($m == 12) {
			$mount = "DES";
		} 

		return $mount;
	}

}