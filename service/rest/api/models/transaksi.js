var connection = require('./conn');

module.exports = {
    insertNewTransaction: function(card_receiver, card_sender, balance, callback) {
        connection.query("INSERT INTO transaksi (`no_pengirim`, `no_penerima`, `jumlah`) VALUES (?, ?, ?)", [card_sender, card_receiver, balance], function(error, rows, fields) {
            if (error) {
                return callback(error);
            }
            else {
                return callback(null);
            }
        })
    }
};