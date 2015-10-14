'use strict';

let fs       = require('fs');
let json2csv = require('json2csv');

class File {
    constructor(path, timestamp) {
        this.path      = path;
        this.timestamp = timestamp;
        this.header    = false;

        fs.writeFileSync(this.path, '');
    }

    writeLine(data) {
        data.lucida_timestamp = this.timestamp;
        
        let fields = Object.keys(data);

        json2csv({ data: data, fields: fields, del: '\t'}, (err, csv) => {
            if (err) throw new Error(err);
            
            if( this.header ){
                csv = csv.substring( csv.indexOf('\n'));
            } else {
                this.header = true;
            }

            fs.appendFileSync(this.path, csv);
        });
    }
}


module.exports = File;