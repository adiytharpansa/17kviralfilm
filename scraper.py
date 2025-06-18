
import requests, json
from bs4 import BeautifulSoup

def scrape_xvideos():
    url = "https://www.xvideos.com/new/"
    r = requests.get(url, headers={"User-Agent": "Mozilla/5.0"})
    soup = BeautifulSoup(r.text, "html.parser")
    data = []

    for block in soup.select(".thumb-block")[:20]:
        try:
            a = block.select_one("a")
            link = a["href"]
            vid = link.strip("/").split("/")[-1]
            title = a.text.strip()
            embed = f"<iframe src='https://www.xvideos.com/embedframe/{vid}' frameborder='0' width='100%' height='400' allowfullscreen></iframe>"
            thumb = block.select_one("img")["data-src"]
            duration = block.select_one(".duration").text.strip()
            data.append({
                "id": vid,
                "title": title,
                "thumb": thumb,
                "embed": embed,
                "duration": duration,
                "views": 0
            })
        except:
            continue

    with open("videos.json", "w") as f:
        json.dump(data, f, indent=2)

if __name__ == "__main__":
    scrape_xvideos()
