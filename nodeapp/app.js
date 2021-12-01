var express = require('express');
var app = express();
var mongoose = require('mongoose');
require('./user.js');
var User = mongoose.model('sqli');

var bodyParser = require('body-parser');
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));

mongoose.connect('mongodb://db_mongo_new:27017/nosqli');

app.get('/', function (req, res) {
    res.send('please go /login to login');
});

app.get("/login", function (req, res) {
    res.send('please post param name and passwd');
})

app.post('/login', function (req, res) {
    User.findOne({ 'name': req.body.name, 'passwd': req.body.passwd }, function (err, data) {
        if (err) {
            res.send(err);
        } else if (data) {
            res.send('====Login Success====<br>username: ' + req.body.name);
        } else {
            res.send('Login Failed!');
        }
    })
});

app.listen(8079, function () {
    console.log('NodeJS MongoDB Injection Demo Run on 8079');
});