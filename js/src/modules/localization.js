export default function getLocalization(stringKey) {
  if (typeof window.Cbrne_Theme_screenReaderText === 'undefined' || typeof window.Cbrne_Theme_screenReaderText[stringKey] === 'undefined') {
    // eslint-disable-next-line no-console
    console.error(`Missing translation for ${stringKey}`);
    return '';
  }
  return window.Cbrne_Theme_screenReaderText[stringKey];
}
