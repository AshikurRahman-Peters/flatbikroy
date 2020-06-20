function CheckFieldLength(fn,wn,rn,mc) {
  var len = fn.value.length;
  if (len > mc) {
    fn.value = fn.value.substring(0,mc);
    len = mc;
  }
  document.getElementById(wn).innerHTML = len;
  document.getElementById(rn).innerHTML = mc - len;
}

function ChangeHeight(id){
	document.getElementById(id).style.overflow='visible';
	document.getElementById(id).style.height='10px';
}

function numericFilter(txb) {
   txb.value = txb.value.replace(/[^\0-9]/ig, "");
}