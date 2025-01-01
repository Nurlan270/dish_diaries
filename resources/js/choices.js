import Choices from "choices.js";

document.addEventListener("DOMContentLoaded", function () {
    const ingredients = new Choices('#ingredients', {
        removeItemButton: true,
        duplicateItemsAllowed: false,
        placeholderValue: 'Type an ingredient name and press enter',
        addChoices: true,
        addItems: true,
        addItemText: (value) => `Press Enter to add <strong>"${value}"</strong>`,
        noResultsText: 'No results found',
        noChoicesText: 'No more choices available',
    });
});
