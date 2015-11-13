<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vocabulary extends CI_Model {

	public function getAll(){
		return $this->db_animal();
	}

	public function db_animal(){
			$array = [
		"Abalone" => "bào ngư",
		"Aligator" => "cá sấu nam mỹ",
		"Anteater" => "thú ăn kiến",
		"Armadillo" => "ta tu",
		"Ass" => "lừa",
		"Baboon" => "khỉ đầu chó",
		"Bat" => "dơi",
		"Beaver" => " hải ly",
		"Beetle" => " bọ cánh cứng",
		"Blackbird" => "sáo",
		"Boar" => " lợn rừng",
		"Buck" => " nai đực",
		"Bumble-bee" => " ong nghệ",
		"Bunny" => "thỏ con",
		"Butter-fly" => " bươm bướm",
		"Camel" => " lạc đà",
		"Canary" => " chim vàng anh",
		"Carp" => "cá chép",
		"Caterpillar" => "sâu bướm",
		"Centipede" => "rết",
		"Chameleon" => "tắc kè hoa",
		"Chamois" => " sơn dương",
		"Chihuahua" => "chó nhỏ có lông mươt",
		"Chimpanzee" => "tinh tinh",
		"Chipmunk" => " sóc chuột",
		"Cicada" =>  "ve sầu",
		"Cobra" => " rắn hổ mang",
		"Cock roach" => "gián",
		"Cockatoo" => "vẹt mào",
		"Crab" => "cua",
		"Crane" => "sếu",
		"Cricket" => "dế",
		"Crocodile" => "cá sấu",
		"Dachshund" => "chó chồn",
		"Dalmatian" => "chó đốm",
		"Donkey" => "lừa",
		"Dove, pigeon" => " bồ câu",
		"Dragon- fly" => " chuồn chuồn",
		"Dromedary" => " lạc đà 1 bướu",
		"Duck" => " vịt",
		"Eagle" => " chim đại bàng",
		"Eel" => "lươn",
		"Elephant" => "voi",
		"Falcon" => "chim Ưng",
		"Fawn" => " nai ,hươu nhỏ",
		"Fiddler crab" => "cáy",
		"Fire- fly" => " đom đóm",
		"Flea" => " bọ chét",
		"Fly" => "ruồi",
		"Foal" => "ngựa con",
		"Fox" => "cáo",
		"Frog" => "ếch",
		"Gannet" => "chim ó biển",
		"Gecko" => " tắc kè",
		"Gerbil" => "chuột nhảy",
		"Gibbon" => "vượn",
		"Giraffe" => "hươu cao cổ",
		"Goat" => "dê",
		"Gopher" => "chuột túi, chuột vàng hay rùa đất",
		"Grasshopper" => "châu chấu nhỏ",
		"Greyhound" => "chó săn thỏ",
		"Hare" => "thỏ rừng",
		"Hawk" => "diều hâu",
		"Hedgehog" => "nhím",
		"Heron" => "diệc",
		"Hind" => "hươu cái",
		"Hippopotamus" => " hà mã",
		"Horseshoe crab" => "Sam",
		"Hound" => "chó săn",
		"HummingBird" => " chim ruồi",
		"Hyena" => " linh cẫu",
		"Iguana" => " kỳ nhông, kỳ đà",
		"Insect" => "côn trùng",
		"Jellyfish" => "sứa",
		"Kingfisher" => "chim bói cá",
		"Lady bird" => "bọ rùa",
		"Lamp" => " cừu non",
		"Lemur" => " vượn cáo",
		"Leopard" => "báo",
		"Lion" => "sư tử",
		"Llama" => "lạc đà ko bướu",
		"Locust" => " cào cào",
		"Lopster" => "tôm hùm",
		"Louse" => " cháy rân",
		"Mantis" => " bọ ngựa",
		"Mosquito" => " muỗi",
		"Moth" => " bướm đêm ,sâu bướm",
		"Mule" => "la",
		"Mussel" => "trai",
		"Nightingale" => "chim sơn ca",
		"Octopus" => "bạch tuột",
		"Orangutan" => "đười ươi",
		"Ostrich" => " đà điểu",
		"Otter" => "rái cá",
		"Owl" => "cú",
		"Panda" => "gấu trúc",
		"Pangolin" => "tê tê",
		"Papakeet" => "vẹt đuôi dài",
		"Parrot" => " vẹt thường",
		 "Peacock" => "công"];
		 return $array;
	}

}

/* End of file vocabulary.php */
/* Location: ./application/models/vocabulary.php */