# FRIULCOIN - Sito Web per Google Sites
## Sistema di Difesa Patrimoniale basato su Sentenze CEDU

---

## 📦 CONTENUTO PACCHETTO

Questo pacchetto contiene 5 pagine HTML ottimizzate per Google Sites:

1. **index.html** - Homepage principale con messaggio di difesa CEDU
2. **sentenze-cedu.html** - Documentazione completa sentenze europee
3. **come-funziona.html** - Spiegazione tecnica sistema FRIULCOIN
4. **inizia-ora.html** - Download wallet e guida passo-passo
5. **tracking.html** - Dashboard analytics per monitoraggio ROI

---

## 🚀 COME PUBBLICARE SU GOOGLE SITES

### Metodo 1: Copia-Incolla HTML (Raccomandato)

1. Vai su https://sites.google.com
2. Crea nuovo sito: **"FRIULCOIN - Difesa Patrimoniale"**
3. Per ogni pagina:
   - Crea nuova pagina in Google Sites
   - Clicca su "Incorpora" > "Incorpora codice"
   - Copia tutto il contenuto HTML del file
   - Incolla nel campo "Codice HTML personalizzato"
   - Salva

### Metodo 2: Iframe Hosting Esterno

Se hai hosting esterno (es. GitHub Pages):

1. Carica tutti i file HTML su hosting
2. In Google Sites usa iframe:
```html
<iframe src="https://tuo-dominio.com/index.html" width="100%" height="100%" frameborder="0"></iframe>
```

---

## 📊 SISTEMA TRACKING UTM

### Come Funziona

Ogni link pubblicato dovrebbe avere parametri UTM per tracciare la fonte:

**Formato:**
```
https://tuosito.com/index.html?utm_source=FONTE&utm_campaign=CAMPAGNA
```

### Esempi Pratici

**Press Release Messaggero Veneto:**
```
?utm_source=messaggeroveneto&utm_campaign=pr_gennaio2025
```

**Articolo Il Friuli:**
```
?utm_source=ilfriuli&utm_campaign=articolo_cedu
```

**Gruppo Telegram:**
```
?utm_source=telegram&utm_campaign=gruppo_friuli
```

**Forum FriuliForum:**
```
?utm_source=friuliforum&utm_campaign=thread_blockchain
```

### Tracking Conversioni

Il form registrazione in `inizia-ora.html` cattura automaticamente:
- utm_source
- utm_campaign
- timestamp
- email utente

I dati vengono salvati in localStorage e possono essere inviati a:
- Google Sheets (via Google Apps Script)
- Database MySQL/PostgreSQL
- Servizi come Airtable, Notion

---

## 📝 CONTENUTI PRINCIPALI

### 1. SENTENZE CEDU CITATE

**Recentissime (2025):**
- ✅ Sentenza Agrisud (11 dicembre 2025) - Art. 8 CEDU
- ✅ Sentenza Italgomme (6 febbraio 2025) - Art. 8 CEDU

**Storiche:**
- ✅ Sentenza Buffalo S.r.l. (2003-2004) - Art. 1 Protocollo 1

**Principi Violati:**
- Art. 8 CEDU: Violazione diritto al domicilio
- Art. 1 Prot. 1: Violazione protezione proprietà
- Art. 6 CEDU: Violazione equo processo

### 2. MESSAGGIO CHIAVE

**Non è evasione, è DIFESA LEGITTIMA**

Le sentenze CEDU dimostrano che l'Italia viola sistematicamente i diritti dei contribuenti. FRIULCOIN offre protezione legale attraverso:
- Disintermediazione bancaria
- Blockchain decentralizzata
- Controllo esclusivo chiavi private

---

## 🎯 STRATEGIA ACQUISIZIONE

### Canali Gratuiti Prioritari

1. **News Locali Friulane**
   - Messaggero Veneto
   - Il Friuli
   - Telefriuli (TV)
   - Radio locali

2. **SEO Locale**
   - "criptovaluta friuli"
   - "protezione patrimoniale sentenze cedu"
   - "difesa abusi fiscali friuli"

3. **Community**
   - Telegram gruppi friulani
   - Forum FriuliForum
   - Reddit r/ItaliaPersonalFinance

4. **Social Organico**
   - LinkedIn posts tecnici
   - Twitter/X thread sentenze CEDU
   - Medium articoli approfonditi

### Angolo Comunicativo

**NON:** "Fai mining e diventa ricco"
**SÌ:** "Proteggi la tua famiglia dagli abusi fiscali condannati dall'Europa"

**NON:** "Evadi le tasse con FRIULCOIN"
**SÌ:** "Sistema di difesa patrimoniale legale basato su sentenze CEDU"

---

## 📧 PRESS KIT

### Titolo Press Release

"Friulano sviluppa sistema digitale di protezione patrimoniale familiare basato su sentenze CEDU contro abusi fiscali"

### Sottotitolo

"FRIULCOIN: tecnologia blockchain per tutelare risparmi e proprietà delle famiglie dal 'fisco predatorio' già condannato dalla Corte Europea"

### Punti Chiave

1. ✅ Italia condannata CEDU per abusi fiscali sistematici
2. ✅ Sentenze Agrisud (dic 2025) e Italgomme (feb 2025)
3. ✅ FRIULCOIN: soluzione tecnologica + base legale europea
4. ✅ 100% legale in Italia (possedere crypto non richiede autorizzazioni)
5. ✅ Progetto friulano per famiglie friulane

---

## 🔧 PERSONALIZZAZIONE

### Modifiche Necessarie Prima del Lancio

**1. Link Download Wallet**
```html
<!-- In inizia-ora.html, sostituire: -->
<a href="#" class="download-btn">
<!-- Con: -->
<a href="https://github.com/tuo-repo/releases/download/v1.0/friulcoin-windows.exe" class="download-btn">
```

**2. Link Risorse**
- Repository GitHub
- Gruppo Telegram
- Block Explorer URL
- Documentazione completa

**3. Form Registrazione Backend**
```javascript
// In inizia-ora.html, sostituire TODO con:
fetch('https://tuo-backend.com/api/register', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(formData)
});
```

**4. Google Analytics**
Aggiungi in tutte le pagine prima di `</head>`:
```html
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-XXXXXXXXXX');
</script>
```

---

## 📊 METRICHE DI SUCCESSO

### KPI Primari

- **Visitatori Unici/Mese:** Target 1,000+
- **Tasso Conversione:** Target 10-15%
- **Registrazioni/Mese:** Target 100+
- **Download Wallet:** Target 50+

### Canali da Monitorare

| Fonte | Conversione Attesa | Priorità |
|-------|-------------------|----------|
| News locali | 15-20% | ⭐⭐⭐⭐⭐ |
| SEO organico | 10-15% | ⭐⭐⭐⭐ |
| Telegram | 15-20% | ⭐⭐⭐⭐ |
| Passaparola | 20-30% | ⭐⭐⭐⭐⭐ |

---

## ⚖️ NOTE LEGALI

### Disclaimer Importante

FRIULCOIN offre **protezione da abusi**, NON aiuto all'evasione:
- ✅ Possedere criptovalute è LEGALE in Italia
- ✅ Sentenze CEDU sono reali e verificabili
- ❌ Obbligo di dichiarare patrimonio >€15k (quadro RW)
- ❌ Tassazione plusvalenze 26% se >€2k giacenza

### Privacy GDPR

Il form registrazione raccoglie dati personali. Necessario:
1. Privacy Policy pubblicata
2. Cookie banner consenso
3. Opt-in esplicito newsletter
4. Diritto cancellazione dati

---

## 🛠️ SUPPORTO TECNICO

### Requisiti Tecnici

- **Hosting:** Google Sites (gratuito)
- **Database:** Google Sheets o Airtable (gratuito)
- **Email:** Gmail (gratuito)
- **Analytics:** Google Analytics 4 (gratuito)

**COSTO TOTALE: €0**

### Troubleshooting

**Problema:** Google Sites blocca alcune funzioni JavaScript
**Soluzione:** Usa Google Apps Script per funzionalità avanzate

**Problema:** Form non salva dati
**Soluzione:** Integra Google Forms embedded o webhook Zapier

**Problema:** CSS non si carica correttamente
**Soluzione:** Usa stili inline nel tag `<style>` (già implementato)

---

## 📞 CONTATTI

**Progetto:** FRIULCOIN
**Email:** [da definire]
**Telegram:** [da definire]
**GitHub:** [da definire]

---

## 📅 ROADMAP PUBBLICAZIONE

### Fase 1: Setup Iniziale (Settimana 1)
- [ ] Pubblicare sito su Google Sites
- [ ] Testare tutti i link
- [ ] Configurare Google Analytics
- [ ] Setup form registrazione

### Fase 2: Contenuti (Settimana 2)
- [ ] Preparare press kit
- [ ] Scrivere comunicato stampa
- [ ] Creare materiali social
- [ ] Documentazione tecnica

### Fase 3: Lancio PR (Settimana 3)
- [ ] Inviare PR a news locali
- [ ] Pubblicare articoli SEO
- [ ] Attivare community Telegram
- [ ] Post social media

### Fase 4: Ottimizzazione (Settimana 4+)
- [ ] Monitorare analytics
- [ ] Ottimizzare conversioni
- [ ] A/B testing landing page
- [ ] Espandere contenuti

---

## ✅ CHECKLIST PRE-LANCIO

Prima di rendere pubblico il sito:

- [ ] Tutti i link funzionano
- [ ] Form registrazione salva dati
- [ ] Tracking UTM configurato
- [ ] Google Analytics attivo
- [ ] Privacy policy pubblicata
- [ ] Cookie consent implementato
- [ ] Testo verificato (no errori)
- [ ] Mobile responsive testato
- [ ] Velocità caricamento OK
- [ ] SEO meta tags compilati

---

## 🎉 LANCIO!

Una volta completata la checklist, sei pronto per lanciare FRIULCOIN al pubblico friulano!

**Ricorda:** Il successo viene dalla COERENZA del messaggio (difesa legittima, non evasione) e dalla QUALITÀ delle fonti (sentenze CEDU verificabili).

Buona fortuna! 🚀🏔️
