const maybe = (t, v) => (v != null ? t(v) : "");

module.exports = {
  maybe
};
