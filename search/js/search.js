document.addEventListener("DOMContentLoaded", () => {
  const research = document.querySelector(".research");
  const search_area = document.querySelector("#search_aaa");
  research.addEventListener("click", () => {
    search_area.focus();
  });
});
