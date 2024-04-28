new DataTable("#inventory", {
  layout: {
    bottomEnd: {
      paging: {
        boundaryNumbers: false,
      },
    },
  },
});

new DataTable("#sales", {
  layout: {
    bottomEnd: {
      paging: {
        boundaryNumbers: false,
      },
    },
  },
  ordering: false,
});
