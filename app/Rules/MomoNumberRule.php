<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MomoNumberRule implements Rule
{
    protected $countryRules = [
        '229' => [ // Bénin
            'length' => 10,
            'prefixes' => ['0140', '0196', '0197', '0198', '0199', '0101', '0102', '0160','0162','0161','0166','0163',
                            '0167','0168','0169','0190','0191','0193','0194','0199','0192','0151'],
        ],
        '225' => [ // Côte d'Ivoire
            'length' => 10,
            'prefixes' => ['05', '07', '01'],
        ],
        '228' => [ // Togo
            'length' => 8,
            'prefixes' => ['9'],
        ],
        '221' => [ // Sénégal
            'length' => 9,
            'prefixes' => ['77', '78', '70'],
        ],
        '223' => [ // Mali
            'length' => 8,
            'prefixes' => ['7', '6'],
        ],
        '227' => [ // Niger
            'length' => 8,
            'prefixes' => ['9', '8'],
        ],
        '224' => [ // Guinée
            'length' => 9,
            'prefixes' => ['6', '5'],
        ],
        '226' => [ // Burkina Faso
            'length' => 8,
            'prefixes' => ['7', '6'],
        ],
    ];

    public function passes($attribute, $value)
    {
        // Retirer le + si présent
        $number = ltrim($value, '+');

        // Trouver l'indicatif du pays
        foreach ($this->countryRules as $countryCode => $rules) {
            if (strpos($number, $countryCode) === 0) {
                $localNumber = substr($number, strlen($countryCode));

                // Vérifier la longueur du numéro
                if (strlen($localNumber) !== $rules['length']) {
                    return false;
                }

                // Vérifier si le numéro commence par un préfixe valide
                foreach ($rules['prefixes'] as $prefix) {
                    if (strpos($localNumber, $prefix) === 0) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    public function message()
    {
        return "Le numéro Mobile Money fourni est invalide ou n'appartient pas à un opérateur reconnu.";
    }
}
