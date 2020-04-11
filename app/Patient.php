<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function isCritical(){
        return $this->cardiac_arrest || $this->irreversible_hypotension || 
            $this->motor_response || $this->severe_burn || 
            $this->other_mortality_conditions;
    }

    public function getGroupNameByNumber($num){
        switch($num){
            case 1: return 'red';
            case 2: return 'yellow';
            case 3: return 'blue';
            case 4: return 'green';
        }
    }

    // RED-1, YELLOW-2, BLUE-3, GREEN-4
    public function getGroup(){
        $sofa = $this->getSOFAScore();
        if ($sofa > 11){
            return 3;
        } else if ($sofa >= 8 && $sofa <= 11) {
            return 2;
        } else if ($sofa <= 7 && $sofa > 1 || $this->at_least_one_organ_failure ){
            return 1;
        } else {
            return 4;
        }
    }

    public function getSOFAScore(){
        $sofa = 0;

        if($this->isBetween($this->pao2_fio2, 300, 400)){
            $sofa++;
        } else if ($this->isBetween($this->pao2_fio2, 200, 300)){
            $sofa+=2;
        } else if ($this->isBetween($this->pao2_fio2, 100, 200)){
            $sofa+=3;
        } else if ($this->isBetween($this->pao2_fio2, 0, 100)){
            $sofa+=4;
        }

        if($this->isBetween($this->platelets, 100, 150)){
            $sofa++;
        } else if ($this->isBetween($this->platelets, 50, 100)){
            $sofa+=2;
        } else if ($this->isBetween($this->platelets, 20, 50)){
            $sofa+=3;
        } else if ($this->isBetween($this->platelets, 0, 20)){
            $sofa+=4;
        }

        if($this->isBetween($this->bilirubin, 1.2, 1.9)){
            $sofa++;
        } else if ($this->isBetween($this->bilirubin, 2, 5.9)){
            $sofa+=2;
        } else if ($this->isBetween($this->bilirubin, 6, 11.9)){
            $sofa+=3;
        } else if ($this->isBetween($this->bilirubin, 12, 1000)){
            $sofa+=4;
        }

        if($this->mabp !== null){
            if ($this->mabp > 70){
                $sofa+=0;
            } else if ($this->dopamine && $this->dopamine < 5){
                $sofa+=2;
            } else if ($this->dopamine && $this->epinephrine && $this->norepinephrine && $this->isBetween($this->dopamine, 6, 15) || $this->epinephrine < 0.1 || $this->norepinephrine < 0.1){
                $sofa+=3;
            } else if ($this->dopamine && $this->epinephrine && $this->norepinephrine && $this->dopamine > 15 || $this->epinephrine > 0.1 || $this->norepinephrine > 0.1){
                $sofa+=4;
            } else {
                $sofa+=1;
            }
        }
        
        if ($this->isBetween($this->getGlazgow(), 13, 14)){
            $sofa++;
        } else if ($this->isBetween($this->getGlazgow(), 10, 12)) {
            $sofa+=2;
        } else if ($this->isBetween($this->getGlazgow(), 6, 9)) {
            $sofa+=3;
        } else if ($this->getGlazgow() < 6) {
            $sofa+=4;
        }

        if ($this->isBetween($this->creatinine, 1.2, 1.9)) {
            $sofa++;
        } else if ($this->isBetween($this->creatinine, 2, 3.4)) {
            $sofa+=2;
        } else if ($this->isBetween($this->creatinine, 3.5, 4.9)) {
            $sofa+=3;
        } else if ($this->creatinine > 5) {
            $sofa+=4;
        }

        return $sofa;
    }

    public function getGlazgow(){
        return $this->best_eye_response + $this->best_verbal_response + $this->best_motor_response;
    }
    
    public function isBetween($num, $a, $b){
        return $num > $a && $num < $b;
    }
}
