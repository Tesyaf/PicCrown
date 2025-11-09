<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>PicCrown — Profil (Logo kiri + Meta bar)</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          boxShadow: {
            warm: '0 10px 25px -5px rgba(251,191,36,.25), 0 8px 10px -6px rgba(249,115,22,.15)'
          }
        }
      }
    }
  </script>

  <script crossorigin src="https://unpkg.com/react@18/umd/react.development.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@18/umd/react-dom.development.js"></script>

  <style>
    html { scroll-behavior: smooth; }
    .corner-glow { position: fixed; inset: 0; pointer-events: none; z-index: -10; }
    .glow { position:absolute; filter: blur(40px); opacity:.35; }
    .glow.tl { top:-160px; left:-160px; width:560px; height:560px;
      background: radial-gradient(closest-side, rgba(253,224,71,.9), rgba(253,224,71,.3), transparent 70%); }
    .glow.br { bottom:-220px; right:-220px; width:800px; height:800px;
      background: radial-gradient(closest-side, rgba(251,191,36,.9), rgba(249,115,22,.25), transparent 70%); }
  </style>
</head>
<body class="min-h-screen bg-white text-neutral-900 antialiased selection:bg-amber-200 selection:text-neutral-900">
  <div class="corner-glow" aria-hidden="true">
    <div class="glow tl"></div>
    <div class="glow br"></div>
  </div>

  <div id="root"></div>

  <script type="text/javascript">
    const LOGO_SRC = '/mnt/data/52c37836-16ce-4b09-8b4b-d50c7decbcdb.png';
    const AVATAR_SRC = '/mnt/data/52c37836-16ce-4b09-8b4b-d50c7decbcdb.png';

    function IconStar({className}) {
      return React.createElement('svg',{xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24', fill:'currentColor', className: className || 'w-4 h-4'},
        React.createElement('path',{d:'M12 17.27 18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'})
      );
    }
    function IconUpload() {
      return React.createElement('svg',{xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24', fill:'none', stroke:'currentColor', strokeWidth:2, strokeLinecap:'round', strokeLinejoin:'round', className:'w-5 h-5'},
        React.createElement('path',{d:'M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4'}),
        React.createElement('path',{d:'M7 10l5-5 5 5'}),
        React.createElement('path',{d:'M12 15V5'})
      );
    }
    function IconEdit() {
      return React.createElement('svg',{xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24', fill:'none', stroke:'currentColor', strokeWidth:2, strokeLinecap:'round', strokeLinejoin:'round', className:'w-5 h-5'},
        React.createElement('path',{d:'M12 20h9'}),
        React.createElement('path',{d:'M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z'})
      );
    }
    function IconCrown() {
      return React.createElement('svg',{xmlns:'http://www.w3.org/2000/svg', viewBox:'0 0 24 24', fill:'currentColor', className:'w-4 h-4'},
        React.createElement('path',{d:'M5 19h14l-1-9-4 3-3-6-3 6-4-3-1 9z'})
      );
    }

    // Navbar kiri-logo saja
    function Navbar() {
      return React.createElement('nav',{className:'sticky top-0 z-10 bg-white/80 backdrop-blur border-b border-amber-100/70'},
        React.createElement('div',{className:'mx-auto max-w-6xl px-6 h-14 flex items-center'},
          React.createElement('img',{src:LOGO_SRC, alt:'PicCrown', className:'h-7 w-auto'})
        )
      );
    }

    function ProfileHeader() {
      return React.createElement('section',{className:'mx-auto max-w-6xl px-6 pt-10 pb-6'},
        React.createElement('div',{className:'flex flex-col md:flex-row md:items-center gap-6'},
          React.createElement('img',{src:AVATAR_SRC, alt:'Avatar', className:'h-28 w-28 rounded-2xl object-cover border border-amber-100/70'}),
          React.createElement('div',{className:'flex-1'},
            React.createElement('div',{className:'flex items-center gap-2 flex-wrap'},
              React.createElement('h1',{className:'text-2xl sm:text-3xl font-extrabold tracking-tight'},'Adila N. Hidayah'),
              React.createElement('span',{className:'inline-flex items-center gap-1 rounded-full border border-amber-200 bg-amber-50 px-2 py-1 text-xs text-amber-700'},
                React.createElement(IconCrown,null),'Top 50')
            ),
            React.createElement('p',{className:'text-neutral-600 mt-2'},'Fotografer hobi • Suka street & candid • Bergabung sejak 2025.'),
            // meta line
            React.createElement('div',{className:'mt-2 flex flex-wrap items-center gap-2 text-sm text-neutral-600'},
              React.createElement('span',{className:'inline-flex items-center gap-1'},
                React.createElement(IconStar,{className:'w-4 h-4'}),'Skor rata-rata: ','4.7'),
              React.createElement('span',{className:'text-neutral-400'},'•'),
              React.createElement('span',null,'Peringkat komunitas: #42')
            )
          ),
          React.createElement('div',{className:'flex items-center gap-3'},
            React.createElement('a',{href:'#', className:'inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold border border-amber-300 text-amber-700 hover:bg-amber-50 transition'},
              React.createElement(IconEdit,null),'Edit Profil'
            ),
            React.createElement('a',{href:'#', className:'inline-flex items-center gap-2 rounded-2xl px-5 py-2.5 font-semibold bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)] hover:opacity-95 transition'},
              React.createElement(IconUpload,null),'Unggah Foto'
            )
          )
        )
      );
    }

    function ProfileStats() {
      const Stat = (label, value) =>
        React.createElement('div',{className:'text-center'},
          React.createElement('div',{className:'text-2xl font-extrabold'}, value),
          React.createElement('div',{className:'text-sm text-neutral-600 mt-1 text-center'}, label)
        );

      return React.createElement('section',{className:'mx-auto max-w-6xl px-6 pb-2'},
        React.createElement('div',{className:'grid grid-cols-2 sm:grid-cols-4 gap-4'},
          React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/80 p-5'}, Stat('Foto','128')),
          React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/80 p-5'}, Stat('Pengikut','2.1K')),
          React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/80 p-5'}, Stat('Mengikuti','354')),
          React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/80 p-5'},
            React.createElement('div',{className:'flex flex-col items-center justify-center'},
              React.createElement('div',{className:'flex items-center gap-1 text-2xl font-extrabold'},
                React.createElement(IconStar,null),'4.7'
              ),
              React.createElement('div',{className:'text-sm text-neutral-600 mt-1 text-center'},'Skor Rata-rata')
            )
          )
        )
      );
    }

    function ProfileTabs({active, onChange}) {
      const Tab = (key, label) => React.createElement(
        'button',
        {
          onClick: ()=>onChange(key),
          className:
            'px-4 py-2 rounded-xl text-sm font-semibold transition ' +
            (active===key
              ? 'bg-gradient-to-r from-yellow-300 via-amber-500 to-orange-500 text-white shadow-[0_10px_25px_-5px_rgba(251,191,36,.25),0_8px_10px_-6px_rgba(249,115,22,.15)]'
              : 'border border-amber-200 text-amber-700 hover:bg-amber-50')
        },
        label
      );

      return React.createElement('div',{className:'mx-auto max-w-6xl px-6 pt-4 pb-6 flex items-center gap-2'},
        Tab('photos','Foto'),
        Tab('likes','Disukai'),
        Tab('about','Tentang')
      );
    }

    function PhotoGrid() {
      const items = Array.from({length: 12}, (_,i)=> i+1);
      return React.createElement('div',{className:'mx-auto max-w-6xl px-6 pb-12'},
        React.createElement('div',{className:'grid gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4'},
          items.map(i => React.createElement('a',{
              key:i, href:'#',
              className:'group relative overflow-hidden rounded-2xl border border-amber-100/70 bg-gradient-to-br from-yellow-100 via-amber-100 to-orange-100'
            },
            React.createElement('div',{className:'aspect-[4/3]'}),
            React.createElement('div',{className:'absolute inset-0 opacity-0 group-hover:opacity-100 transition bg-black/10'}),
            React.createElement('div',{className:'absolute bottom-2 left-2 right-2 flex items-center justify-between text-xs text-white/90'},
              React.createElement('span',null,'Judul Foto ', i),
              React.createElement('span',{className:'inline-flex items-center gap-1'},
                React.createElement(IconStar,null),'4.'+(i%5))
            )
          ))
        )
      );
    }

    function LikesPlaceholder() {
      return React.createElement('div',{className:'mx-auto max-w-6xl px-6 pb-12'},
        React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/70 backdrop-blur-sm p-10 text-center'},
          React.createElement('div',{className:'mx-auto mb-3 inline-flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-yellow-300 via-amber-500 to-orange-500 text-white'},
            React.createElement(IconStar,null)
          ),
          React.createElement('h3',{className:'text-xl font-extrabold mb-1'},'Foto yang Kamu Sukai'),
          React.createElement('p',{className:'text-neutral-600'},'Saat kamu menyukai foto, foto-foto favoritmu akan tampil di sini.')
        )
      );
    }

    function AboutBox() {
      const Row = (label, val) => React.createElement('div',{className:'flex flex-col sm:flex-row sm:items-center sm:justify-between gap-1 py-3 border-b last:border-none border-amber-100/70'},
        React.createElement('div',{className:'text-sm text-neutral-500'},label),
        React.createElement('div',{className:'font-medium'},val)
      );
      return React.createElement('div',{className:'mx-auto max-w-6xl px-6 pb-12'},
        React.createElement('div',{className:'rounded-2xl border border-amber-100/70 bg-white/80 p-6'},
          React.createElement('h3',{className:'text-lg font-semibold mb-3'},'Tentang'),
          React.createElement('p',{className:'text-neutral-700 mb-4'},'Suka hunting street malam, editing ringan di mobile, dan challenge tema mingguan. Terbuka untuk kolaborasi.'),
          Row('Lokasi','Bandar Lampung'),
          Row('Bidang utama','Street, Candid'),
          Row('Bergabung','Mei 2025'),
          Row('Website','piccrown.id/@adila')
        )
      );
    }

    function ProfilePage() {
      const [tab, setTab] = React.useState('photos');
      return React.createElement(React.Fragment, null,
        React.createElement(Navbar),
        React.createElement(ProfileHeader),
        React.createElement(ProfileStats),
        React.createElement(ProfileTabs,{active:tab, onChange:setTab}),
        tab==='photos' ? React.createElement(PhotoGrid)
          : tab==='likes' ? React.createElement(LikesPlaceholder)
          : React.createElement(AboutBox),
        React.createElement('footer',{className:'mx-auto max-w-6xl px-6 py-10 text-sm text-neutral-500 text-center'},
          '© ' + new Date().getFullYear() + ' PicCrown. Semua hak cipta.'
        )
      );
    }

    const root = ReactDOM.createRoot(document.getElementById('root'));
    root.render(React.createElement(ProfilePage));
  </script>
</body>
</html>