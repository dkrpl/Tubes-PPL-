// Quran API Module
const QuranAPI = {
    BASE_URL: 'https://equran.id/api/v2',
    
    async getSurahList() {
        try {
            const response = await fetch(`${this.BASE_URL}/surat`);
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error('Error fetching surah list:', error);
            throw error;
        }
    },
    
    async getSurah(nomor) {
        try {
            const response = await fetch(`${this.BASE_URL}/surat/${nomor}`);
            const data = await response.json();
            return data.data;
        } catch (error) {
            console.error('Error fetching surah:', error);
            throw error;
        }
    },
    
    async searchSurah(query) {
        try {
            const surahs = await this.getSurahList();
            return surahs.filter(surah => 
                surah.namaLatin.toLowerCase().includes(query.toLowerCase()) ||
                surah.nama.includes(query) ||
                surah.arti.toLowerCase().includes(query.toLowerCase())
            );
        } catch (error) {
            console.error('Error searching surah:', error);
            return [];
        }
    },
    
    async getAudioUrl(nomor, reciter = '05') {
        try {
            const surah = await this.getSurah(nomor);
            return surah.audioFull && surah.audioFull[reciter] 
                ? surah.audioFull[reciter] 
                : null;
        } catch (error) {
            console.error('Error getting audio URL:', error);
            return null;
        }
    },
    
    // Cache management
    cache: new Map(),
    
    async getCachedSurah(nomor) {
        if (this.cache.has(nomor)) {
            return this.cache.get(nomor);
        }
        
        const surah = await this.getSurah(nomor);
        this.cache.set(nomor, surah);
        return surah;
    },
    
    async getCachedSurahList() {
        if (this.cache.has('surahList')) {
            return this.cache.get('surahList');
        }
        
        const surahList = await this.getSurahList();
        this.cache.set('surahList', surahList);
        return surahList;
    },
    
    clearCache() {
        this.cache.clear();
    }
};

export default QuranAPI;