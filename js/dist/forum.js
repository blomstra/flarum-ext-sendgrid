(() => {
  var e = {
      n: (o) => {
        var r = o && o.__esModule ? () => o.default : () => o;
        return e.d(r, { a: r }), r;
      },
      d: (o, r) => {
        for (var l in r) e.o(r, l) && !e.o(o, l) && Object.defineProperty(o, l, { enumerable: !0, get: r[l] });
      },
      o: (e, o) => Object.prototype.hasOwnProperty.call(e, o),
      r: (e) => {
        'undefined' != typeof Symbol && Symbol.toStringTag && Object.defineProperty(e, Symbol.toStringTag, { value: 'Module' }),
          Object.defineProperty(e, '__esModule', { value: !0 });
      },
    },
    o = {};
  (() => {
    'use strict';
    e.r(o);
    const r = flarum.core.compat['common/app'];
    e.n(r)().initializers.add('blomstra/flarum-sendgrid', function () {
      console.log('[blomstra/flarum-sendgrid] Hello, forum and admin!');
    });
    const l = flarum.core.compat['forum/app'];
    e.n(l)().initializers.add('blomstra/flarum-sendgrid', function () {
      console.log('[blomstra/flarum-sendgrid] Hello, forum!');
    });
  })(),
    (module.exports = o);
})();
//# sourceMappingURL=forum.js.map
