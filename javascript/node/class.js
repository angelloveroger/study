var student = require('./student.js');
var teacher = require('./teacher.js');


function add(teacherName, studentsName){
	teacher.add(teacherName);
	studentsName.forEach(function(item, index){
		student.add(item);
	});
}

exports.add = add;