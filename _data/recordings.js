const { getRecordings } = require("ffdb-jtm");

module.exports = async function () {
  return await getRecordings();
};
