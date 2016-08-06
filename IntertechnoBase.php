<?

class IntertechnoBase extends IPSModule
{

	public function Create()
	{
		parent::Create();

		//Register Variables
		$this->ConnectParent("{82347F20-F541-41E1-AC5B-A636FD3AE2D8}");
	}

	public function ApplyChanges()
	{
		parent::ApplyChanges();
		//if (IPS_GetKernelRunlevel() == KR_READY)
		//{
			//$Address = $this->GetAdress();
			//$this->SetSummary($Address);
		//}
	}

	################## PRIVATE  ##################

	protected function GetAdress() // must overwrite 
	{
	}

	protected function SendMsg($masterdip, $slavedip, $command) {
		$sA=0;
		$sG=0;
		$sRepeat=12;
		$sPause=11125 /*[Objekt #11125 existiert nicht]*/;
		$sTune=89;
		$sBaud="26,0";
		$sSpeed=32; //erfahrung aus dem Forum auf 32 stellen http://forum.power-switch.eu/viewtopic.php?f=15&t=146
		$uSleep=800000;
		$HEAD="$sA,$sG,$sRepeat,$sPause,$sTune,$sBaud,";
		$TAIL=",1,$sSpeed,;";
		$AN="12,4,4,12,12,4";
		$AUS="12,4,4,12,4,12";
		$bitLow=4;
		$bitHgh=12;
		$seqLow=$bitHgh.",".$bitHgh.",".$bitLow.",".$bitLow.",";
		$seqHgh=$bitHgh.",".$bitLow.",".$bitHgh.",".$bitLow.",";
		$msgM="";
		switch (strtoupper($masterdip)) {
			case "A":
				$msgM=$seqHgh.$seqHgh.$seqHgh.$seqHgh;
				break;
			case "B":
				$msgM=$seqLow.$seqHgh.$seqHgh.$seqHgh;
				break;
			case "C":
				$msgM=$seqHgh.$seqLow.$seqHgh.$seqHgh;
				break;
			case "D":
				$msgM=$seqLow.$seqLow.$seqHgh.$seqHgh;
				break;
			case "E":
				$msgM=$seqHgh.$seqHgh.$seqLow.$seqHgh;
				break;
			case "F":
				$msgM=$seqLow.$seqHgh.$seqLow.$seqHgh;
				break;
			case "G":
				$msgM=$seqHgh.$seqLow.$seqLow.$seqHgh;
				break;
			case "H":
				$msgM=$seqLow.$seqLow.$seqLow.$seqHgh;
				break;
			case "I":
				$msgM=$seqHgh.$seqHgh.$seqHgh.$seqLow;
				break;
			case "J":
				$msgM=$seqLow.$seqHgh.$seqHgh.$seqLow;
				break;
			case "K":
				$msgM=$seqHgh.$seqLow.$seqHgh.$seqLow;
				break;
			case "L":
				$msgM=$seqLow.$seqLow.$seqHgh.$seqLow;
				break;
			case "M":
				$msgM=$seqHgh.$seqHgh.$seqLow.$seqLow;
				break;
			case "N":
				$msgM=$seqLow.$seqHgh.$seqLow.$seqLow;
				break;
			case "O":
				$msgM=$seqHgh.$seqLow.$seqLow.$seqLow;
				break;
			case "P":
				$msgM=$seqLow.$seqLow.$seqLow.$seqLow;
				break;
		}
		$msgS="";
		switch ($slavedip){
			case "1":
				$msgS=$seqHgh.$seqHgh.$seqHgh.$seqHgh;
				break;
			case "2":
				$msgS=$seqLow.$seqHgh.$seqHgh.$seqHgh;
				break;
			case "3":
				$msgS=$seqHgh.$seqLow.$seqHgh.$seqHgh;
				break;
			case "4":
				$msgS=$seqLow.$seqLow.$seqHgh.$seqHgh;
				break;
			case "5":
				$msgS=$seqHgh.$seqHgh.$seqLow.$seqHgh;
				break;
			case "6":
				$msgS=$seqLow.$seqHgh.$seqLow.$seqHgh;
				break;
			case "7":
				$msgS=$seqHgh.$seqLow.$seqLow.$seqHgh;
				break;
			case "8":
				$msgS=$seqLow.$seqLow.$seqLow.$seqHgh;
				break;
			case "9":
				$msgS=$seqHgh.$seqHgh.$seqHgh.$seqLow;
				break;
			case "10":
				$msgS=$seqLow.$seqHgh.$seqHgh.$seqLow;
				break;
			case "11":
				$msgS=$seqHgh.$seqLow.$seqHgh.$seqLow;
				break;
			case "12":
				$msgS=$seqLow.$seqLow.$seqHgh.$seqLow;
				break;
			case "13":
				$msgS=$seqHgh.$seqHgh.$seqLow.$seqLow;
				break;
			case "14":
				$msgS=$seqLow.$seqHgh.$seqLow.$seqLow;
				break;
			case "15":
				$msgS=$seqHgh.$seqLow.$seqLow.$seqLow;
				break;
			case "16":
				$msgS=$seqLow.$seqLow.$seqLow.$seqLow;
				break;
		}

		$msg = $HEAD.$bitLow.",".$msgM.$msgS.$seqHgh.$seqLow.$bitHgh.",".$command.$TAIL;
		$this->SendMsgToParent($msg);
	}
	
	protected function SendMsgToParent($msg) 
	{
		IPS_LogMessage("Intertechno", $msg);
	
		IPS_SendDataToParent(
			$this->InstanceID, 
			json_encode(Array(
					"DataID" => "{79827379-F36E-4ADA-8A95-5F8D1DC92FA9}",
					"EventID" => 0,
					"Buffer" => utf8_encode($msg))));
	}



}

?>
