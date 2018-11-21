const router = require('express').Router();

router.get('/', function(req, res) {
    res.send('Halo');
});

module.exports = router;