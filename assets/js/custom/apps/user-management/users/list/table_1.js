"use strict";
var KTUsersList = function() {
	var e, t, n, r, o = document.getElementById("kt_table_users_1"),
	const a = () => {
		const e = o.querySelectorAll('tbody [type="checkbox"]');
		let c = !1,
			l = 0;
		e.forEach((e => {
			e.checked && (c = !0, l++)
		})), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
	};
	return {
		init: function() {
			o && (o.querySelectorAll("tbody tr").forEach((e => {
				const t = e.querySelectorAll("td"),
					n = t[3].innerText.toLowerCase();
				let r = 0,
					o = "minutes";
				n.includes("yesterday") ? (r = 1, o = "days") : n.includes("mins") ? (r = parseInt(n.replace(/\D/g, "")), o = "minutes") : n.includes("hours") ? (r = parseInt(n.replace(/\D/g, "")), o = "hours") : n.includes("days") ? (r = parseInt(n.replace(/\D/g, "")), o = "days") : n.includes("weeks") && (r = parseInt(n.replace(/\D/g, "")), o = "weeks");
				const c = moment().subtract(r, o).format();
				t[3].setAttribute("data-order", c);
				const l = moment(t[5].innerHTML, "DD MMM YYYY, LT").format();
				t[5].setAttribute("data-order", l)
			})), (e = $(o).DataTable({
				info: 1,
				order: [],
				pageLength: 10,
				lengthChange: !1,
				columnDefs: [{
					 target: 2
                }]
			})).on("draw", (function() {
				l(), c(), a()
			})), l(), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function(t) {
				e.search(t.target.value).draw()
			})), document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", (function() {
				document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((e => {
					$(e).val("").trigger("change")
				})), e.search("").draw()
			})), c(), (() => {
				const t = document.querySelector('[data-kt-user-table-filter="form"]'),
					n = t.querySelector('[data-kt-user-table-filter="filter"]'),
					r = t.querySelectorAll("select");
				n.addEventListener("click", (function() {
					var t = "";
					r.forEach(((e, n) => {
						e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
					})), e.search(t).draw()
				}))
			})())
		}
	}
}();
KTUtil.onDOMContentLoaded((function() {
	KTUsersList.init()
}));