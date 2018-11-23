var connection = require('./conn');

module.exports = {
    getNasabahByCard: function(card_num, callback) {
        connection.query('SELECT id, saldo FROM nasabah WHERE no_kartu = ? LIMIT 1', card_num, function (error, rows, fields) {
            if (error) {
                return callback(error);
            }
            else {
                return callback(null, rows);
            }
        });
    },

    updateBalanceByCard: function(card_receiver, card_sender, receiver_new_balance, sender_new_balance, callback) {
        connection.getConnection(function(error, conn) {
            if (error) {
                return callback(error);
            }
            else {
                conn.beginTransaction(function(err) {
                    if (error) {
                        conn.destroy();
                        return callback(error);
                    }
                    
                    conn.query('UPDATE nasabah SET saldo = ? WHERE no_kartu = ?', [sender_new_balance, card_sender], function(error, rows, fields) {
                        if (error) {
                            return conn.rollback(function() {
                                conn.destroy();
                                return callback(error);
                            });
                        }
                    });

                    conn.query('UPDATE nasabah SET saldo = ? WHERE no_kartu = ?', [receiver_new_balance, card_receiver], function(error, rows, fields) {
                        if (error) {
                            return conn.rollback(function() {
                                conn.destroy();
                                return callback(error);
                            });
                        }
                    });

                    conn.commit(function(error) {
                        if (error) {
                            return conn.rollback(function() {
                                conn.destroy();
                                return callback(error);
                            });
                        }
                        else {
                            conn.release();
                            return callback(null);
                        }
                    });
                });
            }
        });
    }
};