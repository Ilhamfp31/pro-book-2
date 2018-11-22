exports.ok = function(values, res) {
  var data = {
      'status': 200,
      'values': values
  };
  res.status(200);
  res.json(data);
  res.end();
};

exports.notAcceptable = function(message, res) {
	var data = {
		'status': 406,
		'message': message
	};
	res.status(406);
	res.json(data);
	res.end();
}

exports.notFound = function(message, res) {
	var data = {
		'status': 404,
		'message': message
	};
	res.status(404);
	res.json(data);
	res.end();
}