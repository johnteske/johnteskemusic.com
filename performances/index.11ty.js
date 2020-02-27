module.exports = class {
  data() {
    return { title: "Performances" };
  }
  render(data) {
    return `<ul>
      ${Object.keys(data.performances)
        .map(key => `<li>${data.performances[key].title}</li>`)
        .join("")}</ul>`;
  }
};
