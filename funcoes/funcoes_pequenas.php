<?php 
/**
* 
*/
class funcoes
{
	
	public function estadoCivil($estado){
             if ($estado=="Solteiro(a)") { 
                  	$estadoCivil= '<option value="Solteiro(a)">Solteiro(a)</option>';    
                    $estadoCivil.='<option value="Casado(a)">Casado(a)</option>'; 
                    $estadoCivil.=  '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.= '<option value="União de Facto">União de Facto</option>';
   	                $estadoCivil.=' <option value="Viúvo(a)">Viúvo(a)</option>';
                    $estadoCivil.= '<option value="N/A">N/A</option>';
                                         }
            elseif ($estado=="Casado(a)") { 
                    $estadoCivil= '<option value="Casado(a)">Casado(a)</option>';
                    $estadoCivil.= '<option value="Solteiro(a)">Solteiro(a)</option>';
                    $estadoCivil.=  '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.= '<option value="União de Facto">União de Facto</option>';
                    $estadoCivil.=  '<option value="Viúvo(a)">Viúvo(a)</option>';
                    $estadoCivil.=  '<option value="N/A">N/A</option>';
                                       }
            elseif ($estado=="Divorciado(a)") { 
                    $estadoCivil= '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.= '<option value="Solteiro(a)">Solteiro(a)</option>';
                    $estadoCivil.= '<option value="Casado(a)">Casado(a)</option>';
                    $estadoCivil.= '<option value="União de Facto">União de Facto</option>';
                    $estadoCivil.= '<option value="Viúvo(a)">Viúvo(a)</option>';
                    $estadoCivil.=  '<option value="N/A">N/A</option>';
                                            } 
            elseif ($estado=="União de Facto") { 
            		$estadoCivil= '<option value="União de Facto">União de Facto</option>';
            		$estadoCivil.= '<option value="Solteiro(a)">Solteiro(a)</option>';
           			$estadoCivil.= '<option value="Casado(a)">Casado(a)</option>';
            		$estadoCivil.= '<option value="Divorciado(a)">Divorciado(a)</option>';
            		$estadoCivil.= '<option value="Viúvo(a)">Viúvo(a)</option>';
            		$estadoCivil.= '<option value="N/A">N/A</option>';
                                            } 
            elseif ($estado=="Viúvo(a)") { 
                    $estadoCivil=' <option value="Viúvo(a)">Viúvo(a)</option>';
                    $estadoCivil.= '<option value="Solteiro(a)">Solteiro(a)</option>';
                    $estadoCivil.='<option value="Casado(a)">Casado(a)</option>';
                    $estadoCivil.= '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.='<option value="União de Facto">União de Facto</option>';
                    $estadoCivil.= '<option value="N/A">N/A</option>';
                                    } 
            elseif ($estado=="N/A") { 
                    $estadoCivil= '<option value="N/A">N/A</option>';
                    $estadoCivil.=   '<option value="Solteiro(a)">Solteiro(a)</option>';
                    $estadoCivil.=  '<option value="Casado(a)">Casado(a)</option>';
                    $estadoCivil.=  '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.=   '<option value="União de Facto">União de Facto</option>';
                    $estadoCivil.=  '<option value="Viúvo(a)">Viúvo(a)</option>';
                                } 
            else{ 
                    $estadoCivil= '<option value="N/A">N/A</option>';
                    $estadoCivil.=   '<option value="Solteiro(a)">Solteiro(a)</option>';
                    $estadoCivil.=  '<option value="Casado(a)">Casado(a)</option>';
                    $estadoCivil.=  '<option value="Divorciado(a)">Divorciado(a)</option>';
                    $estadoCivil.=   '<option value="União de Facto">União de Facto</option>';
                    $estadoCivil.=  '<option value="Viúvo(a)">Viúvo(a)</option>';
                                }  
            return $estadoCivil;
    }

    public function genero($estado)
    {
    	if ($estado=="Femenino") { 
    			$genero='<option value="Femenino">Femenino</option>';
                $genero.='<option value="Masculino">Masculino</option>';
                
        }else{ 
                $genero='<option value="Masculino">Masculino</option>';
                $genero.='<option value="Femenino">Femenino</option>';
        }
        return $genero;
    
	}
}