var t=/\s/;function e(n){for(var r=n.length;r--&&t.test(n.charAt(r)););return r}var o=/^\s+/;function a(n){return n&&n.slice(0,e(n)+1).replace(o,"")}export{a as b};
