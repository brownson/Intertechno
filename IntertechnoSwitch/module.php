<?
require_once(__DIR__ . DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."IntertechnoBase.php"); 

class IntertechnoSwitch extends IntertechnoBase
{
	
	public function Create()
	{
		parent::Create();

		$this->RegisterPropertyString("MasterDIP", "A");
		$this->RegisterPropertyString("SlaveDIP", "1");

		$this->RegisterVariableBoolean("STATE", "STATE", "~Switch");
		$this->EnableAction("STATE");
		
		$this->RegisterScript("SWITCHON",  "Switch On",  '<? ITSW_SwitchOn(IPS_GetParent($_IPS["SELF"])); ?>'); 
		$this->RegisterScript("SWITCHOFF", "Switch Off", '<? ITSW_SwitchOff(IPS_GetParent($_IPS["SELF"])); ?>'); 
	}

		public function RequestAction($Ident, $Value)
		{
			switch($Ident) {
				case "STATE":
					$this->SwitchState($Value);
					break;
				default:
					throw new Exception("Invalid ident");
			}
		
		}

	
	public function ApplyChanges()
	{
		parent::ApplyChanges();
	}

	protected function GetAdress()
	{
		return $this->ReadPropertyString("MasterDIP") . $this->ReadPropertyString("SlaveDIP");
	}

	public function SwitchOn()
	{
		$this->SendCommand("12,4,4,12,12,4");
		SetValue($this->GetIDForIdent("STATE"), true);
	}

	public function SwitchOff()
	{
		$this->SendCommand("12,4,4,12,4,12");
		SetValue($this->GetIDForIdent("STATE"), false);
	}

	public function SwitchState($value)
	{
		if ($value)
			$this->SwitchOn();
		else
			$this->SwitchOff();
	}

	protected function SendCommand($command)
	{
		parent::SendMsg($this->ReadPropertyString("MasterDIP"), 
		                $this->ReadPropertyString("SlaveDIP"), 
		                $command);
	}

}

?>
