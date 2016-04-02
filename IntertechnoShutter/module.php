<?
require_once(__DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."IntertechnoBase.php"); 

class IntertechnoShutter extends IntertechnoBase
{
	
	public function Create()
	{
		parent::Create();

		$this->RegisterPropertyString("MasterDIP", "A");
		$this->RegisterPropertyString("SlaveDIP", "1");

		$this->RegisterScript("MOVEDOWN", "Move Down", '<? ITSH_MoveDown(IPS_GetParent($_IPS["SELF"])); ?>'); 
		$this->RegisterScript("MOVEUP",   "Move Up",   '<? ITSH_MoveUp(IPS_GetParent($_IPS["SELF"])); ?>'); 
	}

	protected function GetAdress()
	{
		return $this->ReadPropertyString("MasterDIP") . $this->ReadPropertyString("SlaveDIP");
	}

	public function MoveDown()
	{
		$this->SendCommand("12,4,4,12,12,4");
	}

	public function MoveUp()
	{
		$this->SendCommand("12,4,4,12,4,12");
	}

	public function Move($value)
	{
		if ($value)
			MoveDown();
		else
			MoveUp();
	}

	protected function SendCommand($command)
	{
		parent::SendMsg($this->ReadPropertyString("MasterDIP"), 
		                $this->ReadPropertyString("SlaveDIP"), 
		                $command);
	}

}

?>
