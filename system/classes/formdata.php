<?php

namespace system\classes;

interface iFormData
{
	public function getValue($fieldName);
	public function isObligate($fieldName);
	public function getMaxLength($fieldName);
	public function save();
}

/**
 * FormData is een dummy data injectie voor de FormBuilder class
 *
 * Om de FormBuilder bruikbaar te maken voor meerdere frameworks
 * die op hun eigen manier omgaan met het ophalen en opslaan van data
 * van en naar de database wordt gebruik gemaakt van een 'FormData' class
 * injectie. 
 *
 * Om de FormBuilder class te kunnen gebruiken is het verplicht om een 
 * formdata class mee te geven. Deze class moet de iFormData interface
 * implementeren. Bijvoorbeeld:
 *
 * class FormData implements iFormData
 *
 * Deze class is een dummy en doet niets met data uit de database. De
 * class is bedoeld om FormBuilder uit te kunnen testen zonder dat er
 * eerst verplicht een class geschreven hoeft te worden. Echter zullen
 * de formfields dus altijd leeg zijn, de formfields zullen nooit verplicht
 * zijn en er zal nooit geen maximale lengte validatie zijn.
 *
 * @category   FormBuilder
 * @author     Frank Beentjes <frankbeen@gmail.com>
 */
class FormData implements iFormData
{
	/**
     * Verkrijg de waarde van een formfield.
     *
     * Hier wordt u in de gelegenheid gesteld om een inhoud terug te geven 
     * voor het opgegeven formfield. Wanneer het form voor de eerste keer
	 * weergegeven wordt kan het zijn dat u in een formfield al een waarde 
	 * wilt laten zien. Bijvoorbeeld als u een gebruiker zijn profiel wilt
	 * kunnen laten veranderen dan is het wel handig als zijn naam al
	 * ingevuldt wordt zodat de gebruiker deze kan controleren en zonodig wijzigen.
     *
     * @param string $fieldName de naam van het formfield. (bijv. 'naam')
     *
     * @return string De waarde van het formfield.
     *            
     * @access public
      */
	public function getValue($fieldName)
	{
		return null;
	}
	
	public function isObligate($fieldName)
	{
		return false;
	}
	
	public function getMaxLength($fieldName)
	{
		return -1;
	}
        
	public function save()
	{
            return null;
        }
}

