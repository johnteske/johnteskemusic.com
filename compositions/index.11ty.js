module.exports = class {
  data() {
    return { title: "Compositions" };
  }
  render(data) {
    return `<ul>
      ${Object.keys(data.compositions)
        .map(key => `<li>${data.compositions[key].title}</li>`)
        .join("")}</ul>`;
  }
};
