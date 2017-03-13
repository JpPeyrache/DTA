var tab = {
  'I' : 1,
  'IV' : 4,
  'V' : 5,
  'IX' : 9,
  'X' : 10,
  'XL' : 40,
  'L' : 50,
  'XC' : 90,
  'C' : 100,
  'CD' : 400,
  'D' : 500,
  'CM' : 900,
  'M' : 1000
};

function roman_to_number(rom){
  var key;
  var res = 0;

  var i = 0;
  while(rom[i]){
    key = rom[i] + rom[i+1];
    if(tab[key]){
      res += tab[key];
      i += 2;
    }else{
      res += tab[rom[i]];
      i++;
    }
  }

  return res;
}

roman_to_number("MCMCDXLVIII");

function number_to_roman(num){
  var res = "";

  while(num > 0){
    if(num >= 1000){
      num -= 1000;
      res += "M";
    }else if(num >= 900){
      num -= 900;
      res += "CM";
    }else if(num >= 500){
      num -= 500;
      res += "D";
    }else if(num >= 400){
      num -= 400;
      res += "CD";
    }else if(num >= 100){
      num -= 100;
      res += "C";
    }else if(num >= 90){
      num -= 90;
      res += "XC";
    }else if(num >= 50){
      num -= 50;
      res += "L";
    }else if(num >= 40){
      num -= 40;
      res += "XL";
    }else if(num >= 10){
      num -= 10;
      res += "X";
    }else if(num >= 9){
      num -= 9;
      res += "IX";
    }else if(num >= 5){
      num -= 5;
      res += "V";
    }else if(num >= 4){
      num -= 4;
      res += "IV";
    }else{
      num -= 1;
      res += "I";
    }
  }

  return res;
}

number_to_roman(2948);
