(() => {
    const titles = document.querySelectorAll('h2');
    const aside = document.querySelector('.aside__list');
    let list = '';
    console.log(titles);
    titles.forEach((title, i) => {
        console.log(title);
        title.id = i;
        list += '<li><a href="#' + i + '">' + title.textContent + '</a></li>';
    });
    aside.innerHTML = list;
})();
