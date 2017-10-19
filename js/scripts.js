$(function () {  
  pickmeup('.date', {
		position		: 'right',
		hide_on_select	: true,
    format  : 'Y-m-d',
    locale : 'ru',
    default_date : false,
    locales : {
    ru : {
	days: ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'],
	daysShort: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
	daysMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
	months: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
	monthsShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн', 'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек']
  } 
   	}
  
});

});



function get (data,edit){
    $("#date_table").load("list_"+data+".php?edit="+edit);
}

function toggle(box,theId) {
   if(document.getElementById) {
      var cell = document.getElementById(theId);
      if(box.checked) {
         cell.className = "delete_on";
         document.getElementById("button1").value="Удалить";
      }
      else {
         cell.className = "delete_off";
         document.getElementById("button1").value="Редактировать";
      }
   }
}