const response = require('../controllers/res');
const conn = require('../models/conn');

exports.transfer = function(req, res) {
	const pengirim = req.body.no_pengirim;
	const penerima = req.body.no_penerima;
	const jumlah = req.body.jumlah;
	conn.query('SELECT id, saldo FROM nasabah WHERE no_kartu = ? AND saldo >= ?', [pengirim, jumlah], function(error, rows, field) {
		if (error) {
			throw error;
		}
		else {
			if (rows.length == 0) {
				response.notFound('No kartu pengirim tidak ditemukan atau saldo pengirim tidak cukup', res);
				conn.destroy();
			}
			else {
				let saldo_pengirim = rows[0].saldo;
				conn.query('SELECT id, saldo FROM nasabah WHERE no_kartu = ' + penerima, function(error, rows, field) {
					if (error) {
						throw error;
					}
					else {
						if (rows.length == 0) {
							response.notFound('No kartu penerima tidak ditemukan', res);
							conn.destroy();
						}
						else {
							let saldo_penerima = rows[0].saldo;
							console.log(saldo_penerima + jumlah);
							conn.beginTransaction(function(err) {
								if (error) {
									throw error;
								}
								
								conn.query('UPDATE nasabah SET saldo = ? WHERE no_kartu = ?', [saldo_pengirim - jumlah, pengirim], function(error, rows, field) {
									if (error) {
										return conn.rollback(function() {
											throw error;
										});
									}
								});

								conn.query('UPDATE nasabah SET saldo = ? WHERE no_kartu = ?', [saldo_penerima + jumlah, penerima], function(error, rows, fields) {
									if (error) {
										return conn.rollback(function() {
											throw error;
										});
									}
								});

								conn.commit(function(error) {
									if (error) {
										return conn.rollback(function() {
											throw error;
										});
									}
									response.ok("Transfer Berhasil", res);
									conn.destroy();
								});
							});
						}
					}
				});
			}
		}
	});

}