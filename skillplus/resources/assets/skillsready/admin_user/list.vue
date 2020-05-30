<template>
  <div class="row">
    <div class="col-lg-12">
      <my-vuetable
        :vt-api-url="vt.apiUrl"
        :vt-fields="vt.fields"
        :vt-css="vt.css"
        :vt-params="vt.moreParams"
        :vt-sort="vt.sortOrder"
        :vt-length-menu="vt.lengthmenu"
      ></my-vuetable>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      vt: {
        apiUrl: "/admin/user_dashboard/request/article",
        fields: [
          {
            name: "__sequence",
            title: "#",
            titleClass: "text-right",
            dataClass: "text-right"
          },
          {
            name: "__checkbox",
            titleClass: "text-center",
            dataClass: "text-center"
          },
          {
            name: "title",
            title: "Title",
            sortField: "title"
          },
          {
            name: "category",
            title: "Category",
            sortField: "category"
          },
          {
            name: "create_at",
            title: "Date",
            sortField: "create_at",
            titleClass: "text-center",
            dataClass: "text-center",
            callback: "formatDate|DD-MM-YYYY"
          },
          {
            name: "status",
            title: "Status",
            sortField: "status"
          },
          {
            name: "__component:custom-actions",
            title: "Actions",
            titleClass: "text-center",
            dataClass: "text-center"
          }
        ],
        css: {
          table: {
            tableClass: "table table-bordered table-striped table-hover",
            ascendingIcon: "glyphicon glyphicon-chevron-up",
            descendingIcon: "glyphicon glyphicon-chevron-down"
          },
          pagination: {
            wrapperClass: "pagination",
            activeClass: "active",
            disabledClass: "disabled",
            pageClass: "page",
            linkClass: "link",
            icons: {
              first: "",
              prev: "",
              next: "",
              last: ""
            }
          },
          icons: {
            first: "glyphicon glyphicon-step-backward",
            prev: "glyphicon glyphicon-chevron-left",
            next: "glyphicon glyphicon-chevron-right",
            last: "glyphicon glyphicon-step-forward"
          }
        },
        sortOrder: [{ field: "title", sortField: "title", direction: "asc" }],
        moreParams: {
          per_page: 5
        },
        lengthmenu: [5, 25, 50]
      }
    };
  }
};
</script>

<style>
</style>