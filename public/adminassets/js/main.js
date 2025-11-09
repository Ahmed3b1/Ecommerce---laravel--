/* global Chart, coreui */

/**
 * --------------------------------------------------------------------------
 * CoreUI Boostrap Admin Template main.js
 * Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
 * --------------------------------------------------------------------------
 */

// Disable the on-canvas tooltip
Chart.defaults.pointHitDetectionRadius = 1;
Chart.defaults.plugins.tooltip.enabled = false;
Chart.defaults.plugins.tooltip.mode = 'index';
Chart.defaults.plugins.tooltip.position = 'nearest';
Chart.defaults.plugins.tooltip.external = coreui.ChartJS.customTooltips;
Chart.defaults.defaultFontColor = coreui.Utils.getStyle('--cui-body-color');
document.documentElement.addEventListener('ColorSchemeChange', () => {
  cardChart1.data.datasets[0].pointBackgroundColor = coreui.Utils.getStyle('--cui-primary');
  cardChart2.data.datasets[0].pointBackgroundColor = coreui.Utils.getStyle('--cui-info');
  mainChart.options.scales.x.grid.color = coreui.Utils.getStyle('--cui-border-color-translucent');
  mainChart.options.scales.x.ticks.color = coreui.Utils.getStyle('--cui-body-color');
  mainChart.options.scales.y.border.color = coreui.Utils.getStyle('--cui-border-color-translucent');
  mainChart.options.scales.y.grid.color = coreui.Utils.getStyle('--cui-border-color-translucent');
  mainChart.options.scales.y.ticks.color = coreui.Utils.getStyle('--cui-body-color');
  cardChart1.update();
  cardChart2.update();
  mainChart.update();
});
const random = (min, max) => Math.floor(Math.random() * (max - min + 1) + min);
const cardChart1 = new Chart(document.getElementById('card-chart1'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'transparent',
      borderColor: 'rgba(255,255,255,.55)',
      pointBackgroundColor: coreui.Utils.getStyle('--cui-primary'),
      data: [65, 59, 84, 84, 51, 55, 40]
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        border: {
          display: false
        },
        grid: {
          display: false,
          drawBorder: false
        },
        ticks: {
          display: false
        }
      },
      y: {
        min: 30,
        max: 89,
        display: false,
        grid: {
          display: false
        },
        ticks: {
          display: false
        }
      }
    },
    elements: {
      line: {
        borderWidth: 1,
        tension: 0.4
      },
      point: {
        radius: 4,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
});
const cardChart2 = new Chart(document.getElementById('card-chart2'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'transparent',
      borderColor: 'rgba(255,255,255,.55)',
      pointBackgroundColor: coreui.Utils.getStyle('--cui-info'),
      data: [1, 18, 9, 17, 34, 22, 11]
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        border: {
          display: false
        },
        grid: {
          display: false,
          drawBorder: false
        },
        ticks: {
          display: false
        }
      },
      y: {
        min: -9,
        max: 39,
        display: false,
        grid: {
          display: false
        },
        ticks: {
          display: false
        }
      }
    },
    elements: {
      line: {
        borderWidth: 1
      },
      point: {
        radius: 4,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
});

// eslint-disable-next-line no-unused-vars
const cardChart3 = new Chart(document.getElementById('card-chart3'), {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgba(255,255,255,.2)',
      borderColor: 'rgba(255,255,255,.55)',
      data: [78, 81, 80, 45, 34, 12, 40],
      fill: true
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    maintainAspectRatio: false,
    scales: {
      x: {
        display: false
      },
      y: {
        display: false
      }
    },
    elements: {
      line: {
        borderWidth: 2,
        tension: 0.4
      },
      point: {
        radius: 0,
        hitRadius: 10,
        hoverRadius: 4
      }
    }
  }
});

// eslint-disable-next-line no-unused-vars
const cardChart4 = new Chart(document.getElementById('card-chart4'), {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgba(255,255,255,.2)',
      borderColor: 'rgba(255,255,255,.55)',
      data: [78, 81, 80, 45, 34, 12, 40, 85, 65, 23, 12, 98, 34, 84, 67, 82],
      barPercentage: 0.6
    }]
  },
  options: {
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      x: {
        grid: {
          display: false,
          drawTicks: false
        },
        ticks: {
          display: false
        }
      },
      y: {
        border: {
          display: false
        },
        grid: {
          display: false,
          drawBorder: false,
          drawTicks: false
        },
        ticks: {
          display: false
        }
      }
    }
  }
});

let mainChart; // متغير عام لتخزين الرسم البياني الحالي

// تحميل الرسم لأول مرة (بيانات الشهر)
loadChartData('month');

// إضافة حدث عند تغيير الخيار (Day / Month / Year)
document.querySelectorAll('[name="options"]').forEach((input) => {
  input.addEventListener('change', () => {
    if (input.id === 'option1') loadChartData('day');
    if (input.id === 'option2') loadChartData('month');
    if (input.id === 'option3') loadChartData('year');
  });
});

// دالة تحميل البيانات من السيرفر ورسمها
function loadChartData(type = 'month') {
  fetch(`/admin/chart-data?type=${type}`)
    .then(res => res.json())
    .then(data => {
      // لو في تشارت مرسوم مسبقًا نحذفه
      if (mainChart) {
        mainChart.destroy();
      }

      // إنشاء الرسم الجديد
      const ctx = document.getElementById('main-chart');

      mainChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: data.months,
          datasets: [
            {
              label: 'Earnings',
              backgroundColor: `rgba(${coreui.Utils.getStyle('--cui-info-rgb')}, .1)`,
              borderColor: coreui.Utils.getStyle('--cui-info'),
              pointHoverBackgroundColor: '#a72626ff',
              borderWidth: 2,
              data: data.earnings,
            },
            {
              label: 'Orders',
              borderColor: coreui.Utils.getStyle('--cui-success'),
              pointHoverBackgroundColor: '#581accff',
              borderWidth: 2,
              data: data.orders,
            },
            {
              label: 'Users',
              borderColor: coreui.Utils.getStyle('--cui-warning'),
              pointHoverBackgroundColor: '#13dd45ff',
              borderWidth: 2,
              data: data.users,
            },
            {
              label: 'Products',
              borderColor: coreui.Utils.getStyle('--cui-danger'),
              pointHoverBackgroundColor: '#f1cf09ff',
              borderWidth: 2,
              data: data.products,
            },
          ],
        },
        options: {
          maintainAspectRatio: false,
          plugins: {
            annotation: {
              annotations: {
                line1: {
                  type: 'line',
                  yMin: 95,
                  yMax: 95,
                  borderColor: coreui.Utils.getStyle('--cui-danger'),
                  borderWidth: 1,
                  borderDash: [8, 5],
                },
              },
            },
            legend: {
              display: true,
            },
          },
          scales: {
            x: {
              grid: {
                color: coreui.Utils.getStyle('--cui-border-color-translucent'),
                drawOnChartArea: false,
              },
              ticks: {
                color: coreui.Utils.getStyle('--cui-body-color'),
              },
            },
            y: {
              border: {
                color: coreui.Utils.getStyle('--cui-border-color-translucent'),
              },
              grid: {
                color: coreui.Utils.getStyle('--cui-border-color-translucent'),
              },
              ticks: {
                beginAtZero: true,
                color: coreui.Utils.getStyle('--cui-body-color'),
                maxTicksLimit: 5,
              },
            },
          },
          elements: {
            line: {
              tension: 0.4,
            },
            point: {
              radius: 0,
              hitRadius: 10,
              hoverRadius: 4,
              hoverBorderWidth: 3,
            },
          },
        },
      });
    })
    .catch((err) => console.error('Error loading chart:', err));
}


document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.dropdown-item form').forEach(form => {
        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const response = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (response.ok) {
                form.closest('.dropdown-item').classList.remove('bg-light');
                form.remove(); // إخفاء زر ✓
            }
        });
    });
});


document.addEventListener("DOMContentLoaded", () => {
    const bell = document.getElementById("notificationDropdown");
    const badge = document.getElementById("notification-badge");

    bell.addEventListener("click", () => {
        if (badge) {
            badge.remove(); // 🔴 إخفاء الدائرة الحمراء عند الضغط على الجرس
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    const bell = document.getElementById("notificationDropdown");
    const badge = document.getElementById("notification-badge");
    const list = document.getElementById("notification-list");

    if (bell) {
        bell.addEventListener("click", async () => {
            // ✅ حذف الدائرة الحمراء
            if (badge) badge.remove();

            // ✅ تحديد كل الإشعارات كمقروءة في السيرفر
            await fetch("/notifications/mark-all-read-ajax", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                },
            });

            // ✅ تحديث القائمة بآخر 5 إشعارات
            const res = await fetch("/notifications/latest");
            const data = await res.json();

            if (list) {
                const items = data.notifications.map(n => `
                    <li class="dropdown-item">
                        <div class="fw-semibold">${n.data.message ?? "إشعار جديد"}</div>
                        <small class="text-muted">${new Date(n.created_at).toLocaleString()}</small>
                    </li>
                `).join("");

                list.innerHTML = `
                    <li class="dropdown-header text-center fw-bold">الإشعارات</li>
                    <li><hr class="dropdown-divider"></li>
                    ${items || '<li class="dropdown-item text-center text-muted">لا توجد إشعارات</li>'}
                    <li><hr class="dropdown-divider"></li>
                    <li class="text-center"><a href="/notifications" class="text-primary">عرض الكل</a></li>
                `;
            }
        });
    }
});











