'use strict';
var mongoose = require('mongoose');
var userSchema = mongoose.Schema({
  name: { type: String },
  passwd: { type: String }
}, { collection: 'sqli' });
mongoose.model('sqli', userSchema);
