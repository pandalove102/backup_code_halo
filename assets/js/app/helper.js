/* global _ */

/*
|--------------------------------------------------------------------------
| DEFINE GLOBAL FUNCTIONS
|--------------------------------------------------------------------------
| @author: Tri Huynh
| @created: 11/09/2018
| @edited_by:
| @updated:
*/

(function () {
    'use strict';

    /* jshint ignore:start */

    window.Helper = {
        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */
        redirect: function (url, isHTTPRedirect = false) {
            if (url) {
                if (isHTTPRedirect) {
                    // Dùng khi điều khiển chuyển hướng bởi js
                    window.location.replace(url);
                } else {
                    // Dùng khi điều khiển chuyển hướng khi user click
                    window.location.href = url;
                }
            }
        },

        /*
        |--------------------------------------------------------------------------
        | Converts flat objects, e.g.: { a: 1, b:2, c:[1,2,3] }  to  "a=1&b=2&c=1,2,3"
        |--------------------------------------------------------------------------
        */
        objToUrl: function (obj) {
            if (this.getType(obj) !== 'object') return '';
            var a = null, str = [];
            for (a in obj) {
                if (obj.hasOwnProperty(a)) str.push(window.escape(a) + '=' + window.escape(obj[a]));
            }
            return str.join('&');
        },

        /*
        |--------------------------------------------------------------------------
        | Converts: "?a=1&b=2&c=3"  to  { a:'1', b:'2', c:'3' }
        |--------------------------------------------------------------------------
        */
        urlToObj: function (url, convert) {
            if (!url || !url.length) return {};
            var params = {}, vars = url.ltrim('\\?').split('&'), pair = null, i = 0, vr = null, n = null, v = null;
            for (; vr = vars[i++];) {
                pair = vr.split('=');
                n = window.unescape(pair[0]);
                v = window.unescape(pair[1]);
                if (v.indexOf(',') > -1) v = v.split(','); // if commas in value - split to array
                if (convert) v = this.varToRealType(v);
                if (params[n] === undefined) params[n] = v; // if first entry with this name
                else if (typeof params[n] === 'string' || typeof params[n] === 'number') params[n] = [params[n], v]; // if second entry with this name
                else params[n].push(v); // if third or more with this name
            }
            return params;
        },

        /*
        |--------------------------------------------------------------------------
        | Returns the parameter value from address bar
        |--------------------------------------------------------------------------
        | @param param        parameter name
        | @param url        url string can be given
        | @param convert    true to convert vars to real types (e.g. '1' to 1)
        | @returns            parameter value
        */
        getParam: function (param, url, convert) {
            var obj = this.urlToObj(url || location.search, convert);
            if (obj[param] !== undefined) return obj[param];
            return false;
        },

        /*
        |--------------------------------------------------------------------------
        | HÀM NÀY LÀ BÓC TÁC DỮ LIỆU TỪ RESPONSE
        |--------------------------------------------------------------------------
        | Tự động nhận dữ liệu elasticsearch hoặc api thông thường
        */

        getData: function (input) {
            if (!input.data) return null;

            if (typeof input.data.hits !== "undefined") {
                if (typeof input.data.hits.hits === "undefined") return null;
                return _.map(input.data.hits.hits, '_source');
            } else {
                if (typeof input.data.elements === "undefined") return null;
                return input.data.elements;
            }
        },

        getLastSortData: function (input) {
            if (!input.data) return null;
                // is elastic search response
                if ((typeof input.data.hits === "undefined") || (typeof input.data.hits.hits === "undefined")) return null;
                var lastHit = _.last(input.data.hits.hits);
                if(!lastHit) return null;
                return lastHit ? JSON.stringify(lastHit.sort) : null;
        },

        getTotalHits : function (input) {
            if (!input.data) return 0;
            if (typeof input.data.hits !== "undefined") {
                return input.data.hits.total
            } else {
                return 0
            }
        }

        /* -------------------------------- END --------------------------------*/
    };
})();